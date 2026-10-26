<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Session-based cart (see CLAUDE.md — no cart_items table). Every action
 * re-validates against live product data; nothing about price/availability
 * is ever trusted from the client.
 */
class CartController extends Controller
{
    /**
     * GET /cart — returns the full cart page normally, or a JSON summary for
     * AJAX calls (used to refresh the header badge / drawer on every page load).
     */
    public function index(Request $request)
    {
        $summary = cart_summary();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json($summary);
        }

        return view('cart.index', $summary);
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required', 'integer'],
            'qty' => ['nullable', 'integer', 'min:1'],
        ]);

        $product = DB::table('products')->where('id', $data['product_id'])->where('status', 1)->first();

        if (!$product) {
            return response()->json(['message' => 'Product not found.'], 404);
        }

        $qty = $data['qty'] ?? $product->moq;

        cart_add_qty($product->id, $qty);

        return response()->json(cart_summary());
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required', 'integer'],
            'qty' => ['required', 'integer', 'min:0'],
        ]);

        if ($data['qty'] > 0) {
            $product = DB::table('products')->where('id', $data['product_id'])->where('status', 1)->first();

            if (!$product) {
                return response()->json(['message' => 'Product not found.'], 404);
            }
        }

        cart_set_qty($data['product_id'], $data['qty']);

        return response()->json(cart_summary());
    }

    public function remove(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required', 'integer'],
        ]);

        cart_remove($data['product_id']);

        return response()->json(cart_summary());
    }
}
