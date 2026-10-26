<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIpUserAgentToContactMessagesTable extends Migration
{
    public function up()
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->string('ip_address', 45)->nullable()->after('message');
            $table->string('user_agent', 255)->nullable()->after('ip_address');
        });
    }

    public function down()
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->dropColumn(['ip_address', 'user_agent']);
        });
    }
}
