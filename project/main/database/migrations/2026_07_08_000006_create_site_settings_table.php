<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    public function up()
    {
        // Single-row settings table (see CLAUDE.md) — read via
        // DB::table('site_settings')->first() rather than an EAV key-value design.
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_ifsc')->nullable();
            $table->string('upi_id')->nullable();
            $table->string('upi_qr_image')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('seo_default_title')->nullable();
            $table->string('seo_default_description')->nullable();
            $table->string('seo_default_keywords')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
}
