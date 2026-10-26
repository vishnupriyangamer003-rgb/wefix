<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Ports the 5 products currently hardcoded in resources/views/products.blade.php
     * into the database, preserving exact name/price/image/description so the
     * storefront shows zero visual regression once Phase 3 wires it up dynamically.
     * Assigned to the most specific matching category/subcategory seeded in
     * CategorySeeder (e.g. "Chowghat Orange Dwarf" -> Dwarf > Orange).
     */
    public function run()
    {
        $now = now();

        $categoryId = function (string $slug) {
            return DB::table('categories')->where('slug', $slug)->value('id');
        };

        $products = [
            [
                'category_slug' => 'tall',
                'name_en' => 'East Coast Tall Seedling',
                'slug' => 'east-coast-tall-seedling',
                'short_description_en' => 'High-yielding East Coast Tall seedlings, known for longevity, wind resistance, and excellent copra content.',
                'price' => 150.00,
                'image' => 'images/shop/plants/coconutplants-1.png',
            ],
            [
                'category_slug' => 'dwarf-orange',
                'name_en' => 'Chowghat Orange Dwarf (COD)',
                'slug' => 'dwarf-orange-coconut-seedling',
                'short_description_en' => 'Premium tender coconut variety. Early bearing, sweet water, and attractive bright orange fruits.',
                'price' => 200.00,
                'image' => 'images/shop/plants/coconutplants-2.png',
            ],
            [
                'category_slug' => 'dwarf-yellow',
                'name_en' => 'Malayan Yellow Dwarf (MYD)',
                'slug' => 'malayan-yellow-dwarf-seedling',
                'short_description_en' => 'Excellent dwarf variety with high water yield. Prefers good irrigation and soil conditions.',
                'price' => 200.00,
                'image' => 'images/shop/plants/coconut-1.webp',
            ],
            [
                'category_slug' => 'dwarf-green',
                'name_en' => 'Malayan Green Dwarf (MGD)',
                'slug' => 'malayan-green-dwarf-seedling',
                'short_description_en' => 'Sturdy dwarf variety with high resistance to root wilt disease and excellent tender water content.',
                'price' => 200.00,
                'image' => 'images/shop/plants/coconut-2.jpg',
            ],
            [
                'category_slug' => 'hybrid-dwarf-x-tall',
                'name_en' => 'Dwarf x Tall (DXT) Hybrid',
                'slug' => 'dwarf-x-tall-hybrid-seedling',
                'short_description_en' => 'High yielding hybrid cultivar combining the early bearing of Dwarf and vigor/copra weight of Tall.',
                'price' => 250.00,
                'image' => 'images/shop/plants/coconutseeding-1.webp',
            ],
        ];

        foreach ($products as $index => $p) {
            $productId = DB::table('products')->insertGetId([
                'category_id' => $categoryId($p['category_slug']),
                'name_en' => $p['name_en'],
                'slug' => $p['slug'],
                'short_description_en' => $p['short_description_en'],
                'price' => $p['price'],
                'offer_price' => null,
                'stock' => 1000,
                'moq' => 100,
                'meta_title' => $p['name_en'] . ' | Jinnah Coconut Nursery Garden',
                'meta_description' => $p['short_description_en'],
                'search_keywords' => strtolower($p['name_en']) . ', ' . $p['category_slug'] . ' coconut, coconut seedling',
                'status' => 1,
                'sort_order' => $index + 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            DB::table('product_images')->insert([
                'product_id' => $productId,
                'path' => $p['image'],
                'alt_text' => $p['name_en'],
                'is_primary' => 1,
                'sort_order' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
