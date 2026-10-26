<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Ports the 2 hardcoded hero slides in resources/views/index.blade.php into
     * the banners table so the homepage carousel is admin-managed (Banner CRUD)
     * with zero visual regression.
     */
    public function run()
    {
        $now = now();

        $banners = [
            [
                'title' => 'Premium Quality Coconut Seedlings',
                'subtitle' => 'Choose from our high-yielding Tall, Dwarf, and Hybrid varieties to ensure a successful plantation and high farming income.',
                'image' => 'images/shop/slider/bg-1.webp',
                'link_url' => 'https://wa.me/919443536257?text=Hi,%20I%20want%20to%20order%20premium%20coconut%20seedlings.',
                'sort_order' => 1,
            ],
            [
                'title' => 'High Yielding Hybrid Crosses',
                'subtitle' => 'Our Dwarf x Tall and Tall x Dwarf hybrid seedlings produce early and yield abundantly to maximize your farm efficiency.',
                'image' => 'images/shop/slider/bg-1.webp',
                'link_url' => '/contact',
                'sort_order' => 2,
            ],
        ];

        foreach ($banners as $b) {
            DB::table('banners')->insert(array_merge($b, [
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
