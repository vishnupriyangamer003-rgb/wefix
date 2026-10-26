<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            BannerSeeder::class,
            TestimonialSeeder::class,
            SiteSettingsSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
