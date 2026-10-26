<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

/**
 * Checkout + dual order-placement paths (manual online payment vs WhatsApp
 * offline order) — see CLAUDE.md business rules. No Eloquent: orders/
 * order_items/payments are all DB::table() inserts.
 */
class CheckoutController extends Controller
{
    /** Business rule: delivery only within Tamil Nadu & Puducherry — the checkout
     *  view renders shipping_state as a locked dropdown of exactly these two, and
     *  this Rule::in() re-validates it server-side (never trust the client). */
    private const GLOBAL_MOQ = 100;

    public function index()
    {
        $summary = cart_summary();

        if ($summary['count'] === 0) {
            return redirect()->route('cart.index')->with('status', 'Your cart is empty.');
        }

        if ($summary['total_qty'] < self::GLOBAL_MOQ) {
            return redirect()->route('cart.index')->with('status', 'Minimum order is ' . self::GLOBAL_MOQ . ' plants across your cart.');
        }

        $customer = DB::table('customers')->find(Auth::guard('web')->id());
        $settings = DB::table('site_settings')->first();

        return view('checkout.index', array_merge($summary, compact('customer', 'settings')));
    }

    public function store(Request $request)
    {
        $summary = cart_summary();

        if ($summary['count'] === 0 || $summary['total_qty'] < self::GLOBAL_MOQ) {
            return redirect()->route('cart.index')->with('status', 'Minimum order is ' . self::GLOBAL_MOQ . ' plants across your cart.');
        }

        $data = $request->validate([
            'shipping_name' => ['required', 'string', 'max:255'],
            'shipping_phone' => ['required', 'regex:/^[6-9][0-9]{9}$/'],
            'shipping_email' => ['nullable', 'email'],
            'shipping_address' => ['required', 'string'],
            'shipping_taluk' => ['required', 'string', 'max:255'],
            'shipping_district' => ['required', 'string', 'max:255'],
            'shipping_state' => ['required', 'string', Rule::in(['Tamil Nadu', 'Puducherry'])],
            'shipping_pincode' => ['required', 'regex:/^[0-9]{6}$/'],
            'billing_same_as_shipping' => ['nullable', 'boolean'],
            'billing_name' => ['required_if:billing_same_as_shipping,0', 'nullable', 'string', 'max:255'],
            'billing_phone' => ['required_if:billing_same_as_shipping,0', 'nullable', 'regex:/^[6-9][0-9]{9}$/'],
            'billing_address' => ['required_if:billing_same_as_shipping,0', 'nullable', 'string'],
            'payment_method' => ['required', Rule::in(['online', 'whatsapp'])],
            // "accepted" is an implicit rule — it fails correctly even when the
            // checkbox is unchecked and the field is omitted from the request
            // entirely, so no separate "required" rule is needed here.
            'terms' => ['accepted'],
        ], [
            'shipping_state.in' => 'We currently deliver only within Tamil Nadu and Puducherry.',
            'shipping_phone.regex' => 'Enter a valid 10-digit mobile number.',
            'shipping_pincode.regex' => 'Enter a valid 6-digit pincode.',
            'terms.accepted' => 'You must accept the terms and conditions to place an order.',
        ]);

        $orderNumber = $this->generateOrderNumber();
        $sameAsShipping = $request->boolean('billing_same_as_shipping', true);

        $orderId = DB::table('orders')->insertGetId([
            'order_number' => $orderNumber,
            'customer_id' => Auth::guard('web')->id(),
            'status' => 'pending',
            'payment_method' => $data['payment_method'],
            'subtotal' => $summary['subtotal'],
            'shipping_charge' => 0,
            'grand_total' => $summary['subtotal'],
            'shipping_name' => $data['shipping_name'],
            'shipping_phone' => $data['shipping_phone'],
            'shipping_email' => $data['shipping_email'] ?? null,
            'shipping_address' => $data['shipping_address'],
            'shipping_taluk' => $data['shipping_taluk'],
            'shipping_district' => $data['shipping_district'],
            'shipping_state' => $data['shipping_state'],
            'shipping_pincode' => $data['shipping_pincode'],
            'billing_name' => $sameAsShipping ? null : $data['billing_name'],
            'billing_phone' => $sameAsShipping ? null : $data['billing_phone'],
            'billing_address' => $sameAsShipping ? null : $data['billing_address'],
            'terms_accepted_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        foreach ($summary['items'] as $item) {
            DB::table('order_items')->insert([
                'order_id' => $orderId,
                'product_id' => $item->product_id,
                'product_name_snapshot' => $item->name,
                'price_snapshot' => $item->price,
                'qty' => $item->qty,
                'line_total' => $item->line_total,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        cart_clear();

        if ($data['payment_method'] === 'online') {
            return redirect()->route('checkout.payment', $orderId);
        }

        return redirect()->route('order.whatsapp', $orderId);
    }

    public function paymentShow($orderId)
    {
        $order = $this->findOwnOrder($orderId);

        if ($order->payment_method !== 'online' || $order->status !== 'pending') {
            return redirect()->route('order.success', $order->id);
        }

        $settings = DB::table('site_settings')->first();

        return view('checkout.payment', compact('order', 'settings'));
    }

    public function paymentStore(Request $request, $orderId)
    {
        $order = $this->findOwnOrder($orderId);

        if ($order->payment_method !== 'online' || $order->status !== 'pending') {
            return redirect()->route('order.success', $order->id);
        }

        $data = $request->validate([
            'screenshot' => ['required', 'image', 'max:5120'],
            'payer_name' => ['required', 'string', 'max:255'],
            'txn_date' => ['required', 'date', 'before_or_equal:today'],
            'remarks' => ['nullable', 'string'],
        ]);

        try {
            $path = image_helper_compress_and_store($request->file('screenshot'), 'payment-proofs');
        } catch (\RuntimeException $e) {
            throw ValidationException::withMessages(['screenshot' => $e->getMessage()]);
        }

        DB::table('payments')->insert([
            'order_id' => $order->id,
            'screenshot_path' => $path,
            'payer_name' => $data['payer_name'],
            'txn_date' => $data['txn_date'],
            'remarks' => $data['remarks'] ?? null,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('orders')->where('id', $order->id)->update([
            'status' => 'payment_waiting',
            'updated_at' => now(),
        ]);

        return redirect()->route('order.success', $order->id);
    }

    public function whatsappRedirect($orderId)
    {
        $order = $this->findOwnOrder($orderId);

        if ($order->payment_method !== 'whatsapp') {
            return redirect()->route('order.success', $order->id);
        }

        $items = DB::table('order_items')->where('order_id', $order->id)->get();
        $settings = DB::table('site_settings')->first();
        $whatsappNumber = $settings->whatsapp_number ?? '919443536257';

        $lines = ["Hi, I'd like to confirm my order #{$order->order_number}:"];
        foreach ($items as $item) {
            $lines[] = "- {$item->product_name_snapshot} x {$item->qty} = Rs " . number_format($item->line_total, 2);
        }
        $lines[] = 'Total: Rs ' . number_format($order->grand_total, 2);
        $lines[] = '';
        $lines[] = "Ship to: {$order->shipping_name}, {$order->shipping_address}, {$order->shipping_taluk}, {$order->shipping_district}, {$order->shipping_state} - {$order->shipping_pincode}";
        $lines[] = "Phone: {$order->shipping_phone}";

        $waLink = 'https://wa.me/' . $whatsappNumber . '?text=' . urlencode(implode("\n", $lines));

        return view('checkout.whatsapp', compact('order', 'items', 'waLink'));
    }

    public function successShow($orderId)
    {
        $order = $this->findOwnOrder($orderId);
        $items = DB::table('order_items')->where('order_id', $order->id)->get();

        return view('checkout.success', compact('order', 'items'));
    }

    public function failedShow()
    {
        return view('checkout.failed');
    }

    private function findOwnOrder($orderId)
    {
        $order = DB::table('orders')
            ->where('id', $orderId)
            ->where('customer_id', Auth::guard('web')->id())
            ->first();

        if (!$order) {
            abort(404);
        }

        return $order;
    }

    private function generateOrderNumber(): string
    {
        do {
            $candidate = 'JKN' . now()->format('ymd') . strtoupper(substr(bin2hex(random_bytes(3)), 0, 5));
        } while (DB::table('orders')->where('order_number', $candidate)->exists());

        return $candidate;
    }
}
