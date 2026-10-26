<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRememberTokenToAdminsTable extends Migration
{
    /**
     * Laravel's SessionGuard::logout() always reads/clears the remember
     * token, even when "remember me" was never used — GenericUser throws an
     * "Undefined index" otherwise. Not exposed in the admin UI; this exists
     * purely so the auth guard's internal logout handling doesn't error.
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->rememberToken();
        });
    }

    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('remember_token');
        });
    }
}
