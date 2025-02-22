<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('branches')->insert([
            [
                'name' => 'Pare',
                'address' => 'Jl. Tegalsari No 82 Tegalsari, Tulungrejo, Pare, Kediri',
                'status' => true,
            ],
            [
                'name' => 'Malang',
                'address' => 'Jl. Putatlor, Gondanglegi, Malang',
                'status' => true,
            ],
            [
                'name' => 'Sidoarjo',
                'address' => 'Blk. CA VII No.52, Sumput, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61228',
                'status' => true,
            ],            
            [
                'name' => 'Gedangan',
                'address' => 'Jl. Raya 456, Gedangan',
                'status' => false,
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
}
