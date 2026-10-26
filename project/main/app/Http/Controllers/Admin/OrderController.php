<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

/**
 * Order management: status pipeline, payment verification, invoice download.
 * No Eloquent — DB::table() throughout.
 */
class OrderController extends Controller
{
    /**
     * Legal forward transitions for the manual status-change dropdown. The
     * payment_waiting -> confirmed jump also happens via the dedicated
     * payment-approve action (which additionally marks the payments row
     * verified) — see approvePayment().
     */
    private const TRANSITIONS = [
        'pending' => ['confirmed', 'cancelled'],
        'payment_waiting' => ['confirmed', 'cancelled'],
        'confirmed' => ['packed', 'cancelled'],
        'packed' => ['shipped', 'cancelled'],
        'shipped' => ['delivered'],
        'delivered' => [],
        'cancelled' => [],
    ];

    public function index(Request $request)
    {
        $query = DB::table('orders')->join('customers', 'customers.id', '=', 'orders.customer_id');

        if ($status = $request->query('status')) {
            $query->where('orders.status', $status);
        }

        if ($search = $request->query('q')) {
            $like = '%' . $search . '%';
            $query->where(function ($w) use ($like) {
                $w->where('orders.order_number', 'like', $like)
                    ->orWhere('customers.name', 'like', $like)
                    ->orWhere('customers.phone', 'like', $like);
            });
        }

        $orders = $query->orderBy('orders.created_at', 'desc')
            ->paginate(20, ['orders.*', 'customers.name as customer_name'])
            ->withQueryString();

        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = db_find_or_404('orders', $id);
        $items = DB::table('order_items')->where('order_id', $id)->get();
        $payment = DB::table('payments')->where('order_id', $id)->latest('id')->first();
        $nextStatuses = self::TRANSITIONS[$order->status] ?? [];

        return view('admin.orders.show', compact('order', 'items', 'payment', 'nextStatuses'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = db_find_or_404('orders', $id);
        $allowed = self::TRANSITIONS[$order->status] ?? [];

        $data = $request->validate([
            'status' => ['required', Rule::in($allowed ?: ['__none__'])],
            'cancelled_reason' => ['nullable', 'string', 'required_if:status,cancelled'],
        ], [
            'status.in' => 'That status change is not allowed from the current order status.',
        ]);

        $update = ['status' => $data['status'], 'updated_at' => now()];
        if ($data['status'] === 'cancelled') {
            $update['cancelled_reason'] = $data['cancelled_reason'] ?? null;
        }

        DB::table('orders')->where('id', $id)->update($update);

        return back()->with('status', 'Order status updated to "' . $data['status'] . '".');
    }

    public function paymentShow($id)
    {
        $order = db_find_or_404('orders', $id);

        if ($order->payment_method !== 'online') {
            abort(404);
        }

        $payment = DB::table('payments')->where('order_id', $id)->latest('id')->first();

        return view('admin.orders.payment', compact('order', 'payment'));
    }

    public function approvePayment($id)
    {
        $order = db_find_or_404('orders', $id);

        if ($order->status !== 'payment_waiting') {
            return back()->with('error', 'This order is not awaiting payment verification.');
        }

        DB::table('payments')->where('order_id', $id)->update([
            'status' => 'verified',
            'verified_by' => Auth::guard('admin')->id(),
            'verified_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('orders')->where('id', $id)->update(['status' => 'confirmed', 'updated_at' => now()]);

        return redirect()->route('admin.orders.show', $id)->with('status', 'Payment approved — order confirmed.');
    }

    public function rejectPayment(Request $request, $id)
    {
        $order = db_find_or_404('orders', $id);

        if ($order->status !== 'payment_waiting') {
            return back()->with('error', 'This order is not awaiting payment verification.');
        }

        $data = $request->validate(['reason' => ['required', 'string']]);

        $existingRemarks = DB::table('payments')->where('order_id', $id)->value('remarks');
        $newRemarks = trim(($existingRemarks ? $existingRemarks . ' ' : '') . '[Rejected by admin: ' . $data['reason'] . ']');

        DB::table('payments')->where('order_id', $id)->update([
            'status' => 'rejected',
            'verified_by' => Auth::guard('admin')->id(),
            'verified_at' => now(),
            'remarks' => $newRemarks,
            'updated_at' => now(),
        ]);

        DB::table('orders')->where('id', $id)->update([
            'status' => 'cancelled',
            'cancelled_reason' => 'Payment rejected: ' . $data['reason'],
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.orders.show', $id)->with('status', 'Payment rejected — order cancelled.');
    }

    public function invoice($id)
    {
        $order = db_find_or_404('orders', $id);
        $items = DB::table('order_items')->where('order_id', $id)->get();

        return render_invoice_pdf_response($order, $items);
    }
}
