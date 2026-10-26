<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Seeds exactly one /ktgadmin login. Idempotent (safe to re-run) — if an
     * admin already exists, does nothing rather than resetting the password.
     * There is intentionally no public admin-registration route; this seeder
     * is the only way a new admin account gets created.
     */
    public function run()
    {
        if (DB::table('admins')->where('email', 'admin@jinnahcoconutnursery.com')->exists()) {
            $this->command->info('Admin already seeded, skipping.');
            return;
        }

        $password = bin2hex(random_bytes(6)); // 12-char random hex password

        DB::table('admins')->insert([
            'name' => 'Super Admin',
            'email' => 'admin@jinnahcoconutnursery.com',
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->command->warn('===============================================');
        $this->command->warn(' Seeded ktgadmin login (change this after first login):');
        $this->command->warn(' Email:    admin@jinnahcoconutnursery.com');
        $this->command->warn(" Password: {$password}");
        $this->command->warn('===============================================');
    }
}
