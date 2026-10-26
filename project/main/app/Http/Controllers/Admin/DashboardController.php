<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_customers' => DB::table('customers')->count(),
            'total_products' => DB::table('products')->count(),
            'total_categories' => DB::table('categories')->count(),
            'total_orders' => DB::table('orders')->count(),
            'pending_orders' => DB::table('orders')->where('status', 'pending')->count(),
            'confirmed_orders' => DB::table('orders')->where('status', 'confirmed')->count(),
            'delivered_orders' => DB::table('orders')->where('status', 'delivered')->count(),
            'revenue' => (float) DB::table('orders')->whereIn('status', ['confirmed', 'packed', 'shipped', 'delivered'])->sum('grand_total'),
        ];

        $recentOrders = DB::table('orders')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->orderBy('orders.created_at', 'desc')
            ->limit(8)
            ->get(['orders.id', 'orders.order_number', 'orders.status', 'orders.grand_total', 'orders.created_at', 'customers.name as customer_name']);

        return view('admin.dashboard', compact('stats', 'recentOrders'));
    }
}
