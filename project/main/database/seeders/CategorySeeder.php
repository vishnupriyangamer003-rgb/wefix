<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Seeds the 3 top-level categories that already exist on the live site
     * (Tall/Dwarf/Hybrid) plus the subcategory examples from the client's
     * spec (Dwarf > Orange/Yellow/Green, Hybrid > Dwarf x Tall/Tall x Dwarf),
     * demonstrating the unlimited-depth category tree. All via DB::table()
     * per project convention — no Eloquent.
     */
    public function run()
    {
        $now = now();

        $tallId = DB::table('categories')->insertGetId([
            'parent_id' => null,
            'name_en' => 'Tall',
            'name_ta' => 'உயரமான',
            'name_hi' => 'लंबी',
            'slug' => 'tall',
            'short_description_en' => 'Tall coconut varieties — known for longevity, wind resistance, and high copra content.',
            'meta_title' => 'Tall Coconut Seedlings',
            'meta_description' => 'Premium Tall coconut seedlings from Jinnah Coconut Nursery Garden, Tamil Nadu.',
            'sort_order' => 1,
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $dwarfId = DB::table('categories')->insertGetId([
            'parent_id' => null,
            'name_en' => 'Dwarf',
            'name_ta' => 'குள்ளமான',
            'name_hi' => 'बौनी',
            'slug' => 'dwarf',
            'short_description_en' => 'Dwarf coconut varieties — early bearing, sweet tender water, compact growth.',
            'meta_title' => 'Dwarf Coconut Seedlings',
            'meta_description' => 'Premium Dwarf coconut seedlings from Jinnah Coconut Nursery Garden, Tamil Nadu.',
            'sort_order' => 2,
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $hybridId = DB::table('categories')->insertGetId([
            'parent_id' => null,
            'name_en' => 'Hybrid',
            'name_ta' => 'கலப்பின',
            'name_hi' => 'संकर',
            'slug' => 'hybrid',
            'short_description_en' => 'Hybrid coconut varieties — combining early bearing with vigorous growth and copra weight.',
            'meta_title' => 'Hybrid Coconut Seedlings',
            'meta_description' => 'Premium Hybrid coconut seedlings from Jinnah Coconut Nursery Garden, Tamil Nadu.',
            'sort_order' => 3,
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $subcategories = [
            ['parent_id' => $dwarfId, 'name_en' => 'Orange', 'slug' => 'dwarf-orange', 'sort_order' => 1],
            ['parent_id' => $dwarfId, 'name_en' => 'Yellow', 'slug' => 'dwarf-yellow', 'sort_order' => 2],
            ['parent_id' => $dwarfId, 'name_en' => 'Green', 'slug' => 'dwarf-green', 'sort_order' => 3],
            ['parent_id' => $hybridId, 'name_en' => 'Dwarf x Tall', 'slug' => 'hybrid-dwarf-x-tall', 'sort_order' => 1],
            ['parent_id' => $hybridId, 'name_en' => 'Tall x Dwarf', 'slug' => 'hybrid-tall-x-dwarf', 'sort_order' => 2],
        ];

        foreach ($subcategories as $sub) {
            DB::table('categories')->insert(array_merge($sub, [
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
