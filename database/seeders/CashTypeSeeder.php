<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CashTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cash_types')->insert([
            ['name' => 'Kas Tunai', 'status' => 1, 'income' => 'Y', 'cashout' => 'Y', 'transfer' => 'Y', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kas Besar', 'status' => 1, 'income' => 'Y', 'cashout' => 'Y', 'transfer' => 'Y', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bank BRI Qomar', 'status' => 1, 'income' => 'Y', 'cashout' => 'Y', 'transfer' => 'Y', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bank Mandiri Qomar', 'status' => 1, 'income' => 'Y', 'cashout' => 'Y', 'transfer' => 'Y', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bank BCA Qomar', 'status' => 1, 'income' => 'Y', 'cashout' => 'Y', 'transfer' => 'Y', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bank Cimb Niaga Qomar', 'status' => 1, 'income' => 'Y', 'cashout' => 'Y', 'transfer' => 'Y', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gopay Qomar', 'status' => 1, 'income' => 'Y', 'cashout' => 'Y', 'transfer' => 'Y', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dana Qomar', 'status' => 1, 'income' => 'Y', 'cashout' => 'Y', 'transfer' => 'Y', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'OVO Qomar', 'status' => 1, 'income' => 'Y', 'cashout' => 'Y', 'transfer' => 'Y', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bank Mandiri Fadloli', 'status' => 1, 'income' => 'Y', 'cashout' => 'Y', 'transfer' => 'Y', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bank Mandiri Arif', 'status' => 1, 'income' => 'Y', 'cashout' => 'Y', 'transfer' => 'Y', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
