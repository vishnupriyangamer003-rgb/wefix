<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Seeds the single settings row with placeholder payment details so the
     * checkout payment page has something to render. Admin can edit these for
     * real in Phase 8 (Settings screen) — flagged clearly as placeholders.
     */
    public function run()
    {
        if (DB::table('site_settings')->exists()) {
            $this->command->info('site_settings already seeded, skipping.');
            return;
        }

        DB::table('site_settings')->insert([
            'bank_name' => 'PLACEHOLDER BANK — update in ktgadmin Settings',
            'bank_account_name' => 'Jinnah Coconut Nursery Garden',
            'bank_account_number' => '000000000000',
            'bank_ifsc' => 'PLACEHOLDER0000',
            'upi_id' => 'placeholder@upi',
            'upi_qr_image' => null,
            'whatsapp_number' => '919443536257',
            'seo_default_title' => 'Jinnah Coconut Nursery Garden - Premium Coconut Seedlings in Tamil Nadu',
            'seo_default_description' => 'Premium quality coconut seedlings in Tamil Nadu. Dwarf, Tall, and Hybrid varieties.',
            'seo_default_keywords' => 'coconut nursery, coconut seedlings, tamil nadu coconut',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->command->warn('Seeded PLACEHOLDER bank/UPI details in site_settings — update via ktgadmin Settings before going live.');
    }
}
