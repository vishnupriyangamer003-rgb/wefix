<?php

use Illuminate\Support\Facades\DB;

/**
 * Plain-function session cart helpers (see CLAUDE.md — cart is session-only,
 * no cart_items table). Session shape: ['cart' => [product_id => qty, ...]].
 */

if (!function_exists('cart_raw')) {
    function cart_raw(): array
    {
        return session('cart', []);
    }
}

if (!function_exists('cart_save')) {
    function cart_save(array $cart): void
    {
        session(['cart' => $cart]);
    }
}

if (!function_exists('cart_add_qty')) {
    function cart_add_qty(int $productId, int $qty): void
    {
        $cart = cart_raw();
        $cart[$productId] = ($cart[$productId] ?? 0) + $qty;
        cart_save($cart);
    }
}

if (!function_exists('cart_set_qty')) {
    function cart_set_qty(int $productId, int $qty): void
    {
        $cart = cart_raw();
        if ($qty <= 0) {
            unset($cart[$productId]);
        } else {
            $cart[$productId] = $qty;
        }
        cart_save($cart);
    }
}

if (!function_exists('cart_remove')) {
    function cart_remove(int $productId): void
    {
        $cart = cart_raw();
        unset($cart[$productId]);
        cart_save($cart);
    }
}

if (!function_exists('cart_clear')) {
    function cart_clear(): void
    {
        session()->forget('cart');
    }
}

if (!function_exists('cart_summary')) {
    /**
     * Builds live line-item data (name/price/image/moq from the DB, never
     * trusted from the client) + totals from the session cart. Entries for
     * products that were deleted/deactivated since being added are silently
     * dropped and the session is re-saved without them.
     */
    function cart_summary(): array
    {
        $cart = cart_raw();

        if (empty($cart)) {
            return ['items' => [], 'subtotal' => 0.0, 'total_qty' => 0, 'count' => 0];
        }

        $products = DB::table('products')
            ->whereIn('id', array_keys($cart))
            ->where('status', 1)
            ->get()
            ->keyBy('id');

        $items = [];
        $subtotal = 0.0;
        $totalQty = 0;
        $changed = false;

        foreach ($cart as $productId => $qty) {
            if (!isset($products[$productId])) {
                unset($cart[$productId]);
                $changed = true;
                continue;
            }

            $product = $products[$productId];
            $price = (float) ($product->offer_price ?: $product->price);
            $lineTotal = $price * $qty;

            $image = DB::table('product_images')
                ->where('product_id', $productId)
                ->orderBy('is_primary', 'desc')
                ->orderBy('sort_order')
                ->value('path');

            $items[] = (object) [
                'product_id' => (int) $product->id,
                'name' => $product->name_en,
                'slug' => $product->slug,
                'price' => $price,
                'qty' => (int) $qty,
                'moq' => (int) $product->moq,
                'line_total' => $lineTotal,
                'image' => $image,
            ];

            $subtotal += $lineTotal;
            $totalQty += $qty;
        }

        if ($changed) {
            cart_save($cart);
        }

        return [
            'items' => $items,
            'subtotal' => $subtotal,
            'total_qty' => $totalQty,
            'count' => count($items),
        ];
    }
}
