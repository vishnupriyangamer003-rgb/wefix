<?php

use Illuminate\Support\Facades\DB;

/**
 * Cached-per-request access to the single site_settings row (WhatsApp number,
 * bank details, etc.) so any Blade view can read it without every controller
 * having to pass it in explicitly — see common/footer.blade.php floating
 * WhatsApp button.
 */

if (!function_exists('site_settings')) {
    function site_settings(): ?object
    {
        static $settings = null;
        static $loaded = false;

        if (!$loaded) {
            $settings = DB::table('site_settings')->first();
            $loaded = true;
        }

        return $settings;
    }
}

if (!function_exists('whatsapp_number')) {
    function whatsapp_number(): string
    {
        return site_settings()->whatsapp_number ?? '919443536257';
    }
}
