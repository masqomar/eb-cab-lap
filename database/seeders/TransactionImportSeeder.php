<?php

namespace Database\Seeders;

use App\Imports\TransactionImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionImportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //IMPORT DATA DARI FILE CSV YANG DISIMPAN DI DALAM FOLDER DATABASE/SEEDERS
         (new TransactionImport)->import(base_path('database/seeders/transactions.csv'));
    }
}
