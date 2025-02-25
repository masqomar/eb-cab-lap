<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone_number' => '98687767677',
            'email_verified_at' => now(),
            'password' => '$2y$12$4ZkeUjs05B5G23rL.xxIvecNcQL4dGDnLHWPrj/wz1PHh5mCKn3nG', // password
            'remember_token' => Str::random(10),
        ]);

        User::factory()->count(10)->create();
    }
}
