<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(AccountTypeSeeder::class);
        $this->call(CashTypeSeeder::class);
    }
}
