<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Single-row site_settings edit form (bank/UPI/WhatsApp/SEO defaults) — see
 * CLAUDE.md for why this is one row rather than an EAV key-value table.
 */
class SettingsController extends Controller
{
    public function edit()
    {
        $settings = DB::table('site_settings')->first();

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'bank_name' => ['nullable', 'string', 'max:255'],
            'bank_account_name' => ['nullable', 'string', 'max:255'],
            'bank_account_number' => ['nullable', 'string', 'max:255'],
            'bank_ifsc' => ['nullable', 'string', 'max:255'],
            'upi_id' => ['nullable', 'string', 'max:255'],
            'whatsapp_number' => ['nullable', 'string', 'max:20'],
            'seo_default_title' => ['nullable', 'string', 'max:255'],
            'seo_default_description' => ['nullable', 'string', 'max:255'],
            'seo_default_keywords' => ['nullable', 'string', 'max:255'],
            'upi_qr_image' => ['nullable', 'image', 'max:5120'],
        ]);

        $existing = DB::table('site_settings')->first();

        if ($request->hasFile('upi_qr_image')) {
            $data['upi_qr_image'] = image_helper_compress_and_store($request->file('upi_qr_image'), 'settings', 500, 500);
            if ($existing) {
                image_helper_delete($existing->upi_qr_image);
            }
        } else {
            unset($data['upi_qr_image']);
        }

        $data['updated_at'] = now();

        if ($existing) {
            DB::table('site_settings')->where('id', $existing->id)->update($data);
        } else {
            $data['created_at'] = now();
            DB::table('site_settings')->insert($data);
        }

        return back()->with('status', 'Settings updated.');
    }
}
