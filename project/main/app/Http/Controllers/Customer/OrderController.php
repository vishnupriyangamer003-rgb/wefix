<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Customer-facing order history, detail, and invoice download.
 * No Eloquent — DB::table() throughout, see CLAUDE.md.
 */
class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')
            ->where('customer_id', Auth::guard('web')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('customer.orders.index', compact('orders'));
    }

    public function show($orderId)
    {
        $order = $this->findOwnOrder($orderId);
        $items = DB::table('order_items')->where('order_id', $order->id)->get();
        $payment = DB::table('payments')->where('order_id', $order->id)->latest('id')->first();

        return view('customer.orders.show', compact('order', 'items', 'payment'));
    }

    public function invoice($orderId)
    {
        $order = $this->findOwnOrder($orderId);

        if (!in_array($order->status, ['confirmed', 'packed', 'shipped', 'delivered'], true)) {
            abort(404);
        }

        $items = DB::table('order_items')->where('order_id', $order->id)->get();

        return render_invoice_pdf_response($order, $items);
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
}
