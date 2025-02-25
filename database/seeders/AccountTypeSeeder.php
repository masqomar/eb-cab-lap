<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('account_types')->insert([
            ['id' => 5, 'code' => 'A4', 'name' => 'Piutang Usaha', 'type' => 'Aktiva', 'income_statement' => '', 'income' => 'Y', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 6, 'code' => 'A5', 'name' => 'Piutang Karyawan', 'type' => 'Aktiva', 'income_statement' => '', 'income' => 'N', 'cashout' => 'Y', 'status' => 0, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 7, 'code' => 'A6', 'name' => 'Pinjaman Anggota', 'type' => 'Aktiva', 'income_statement' => '', 'income' => NULL, 'cashout' => NULL, 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 8, 'code' => 'A7', 'name' => 'Piutang Anggota', 'type' => 'Aktiva', 'income_statement' => '', 'income' => 'Y', 'cashout' => 'Y', 'status' => 0, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 9, 'code' => 'A8', 'name' => 'Persediaan Barang', 'type' => 'Aktiva', 'income_statement' => '', 'income' => 'N', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 10, 'code' => 'A9', 'name' => 'Biaya Dibayar Dimuka', 'type' => 'Aktiva', 'income_statement' => '', 'income' => 'N', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 11, 'code' => 'A10', 'name' => 'Perlengkapan Usaha', 'type' => 'Aktiva', 'income_statement' => '', 'income' => 'N', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 17, 'code' => 'C', 'name' => 'Aktiva Tetap Berwujud', 'type' => 'Aktiva', 'income_statement' => '', 'income' => NULL, 'cashout' => NULL, 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 18, 'code' => 'C1', 'name' => 'Peralatan Kantor', 'type' => 'Aktiva', 'income_statement' => '', 'income' => 'N', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 19, 'code' => 'C2', 'name' => 'Inventaris Kendaraan', 'type' => 'Aktiva', 'income_statement' => '', 'income' => 'N', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 20, 'code' => 'C3', 'name' => 'Mesin', 'type' => 'Aktiva', 'income_statement' => '', 'income' => 'N', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 21, 'code' => 'C4', 'name' => 'Aktiva Tetap Lainnya', 'type' => 'Aktiva', 'income_statement' => '', 'income' => 'Y', 'cashout' => 'N', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 22, 'code' => 'C5', 'name' => 'Inventaris', 'type' => 'Aktiva', 'income_statement' => '', 'income' => 'N', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 23, 'code' => 'J3', 'name' => 'Pendapatan Pendaftaran', 'type' => 'Pasiva', 'income_statement' => 'PENDAPATAN', 'income' => 'Y', 'cashout' => 'N', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 26, 'code' => 'E', 'name' => 'Modal Pribadi', 'type' => 'Aktiva', 'income_statement' => '', 'income' => NULL, 'cashout' => NULL, 'status' => 0, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 27, 'code' => 'E1', 'name' => 'Prive', 'type' => 'Aktiva', 'income_statement' => '', 'income' => 'Y', 'cashout' => 'Y', 'status' => 0, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 28, 'code' => 'F', 'name' => 'Utang', 'type' => 'Pasiva', 'income_statement' => '', 'income' => NULL, 'cashout' => NULL, 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 29, 'code' => 'F1', 'name' => 'Utang Usaha', 'type' => 'Pasiva', 'income_statement' => '', 'income' => 'Y', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 31, 'code' => 'F2', 'name' => 'Pengeluaran Lainnya', 'type' => 'Aktiva', 'income_statement' => '', 'income' => 'N', 'cashout' => 'Y', 'status' => 0, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 32, 'code' => 'F4', 'name' => 'Simpanan Sukarela', 'type' => 'Pasiva', 'income_statement' => '', 'income' => NULL, 'cashout' => NULL, 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 33, 'code' => 'F5', 'name' => 'Utang Pajak', 'type' => 'Pasiva', 'income_statement' => '', 'income' => 'Y', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 36, 'code' => 'H', 'name' => 'Utang Jangka Panjang', 'type' => 'Pasiva', 'income_statement' => '', 'income' => NULL, 'cashout' => NULL, 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 37, 'code' => 'H1', 'name' => 'Utang Bank', 'type' => 'Pasiva', 'income_statement' => '', 'income' => 'Y', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 38, 'code' => 'H2', 'name' => 'Obligasi', 'type' => 'Pasiva', 'income_statement' => '', 'income' => 'Y', 'cashout' => 'Y', 'status' => 0, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 39, 'code' => 'I', 'name' => 'Modal', 'type' => 'Pasiva', 'income_statement' => '', 'income' => NULL, 'cashout' => NULL, 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 40, 'code' => 'I1', 'name' => 'Simpanan Pokok', 'type' => 'Pasiva', 'income_statement' => '', 'income' => NULL, 'cashout' => NULL, 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 41, 'code' => 'I2', 'name' => 'Simpanan Wajib', 'type' => 'Pasiva', 'income_statement' => '', 'income' => NULL, 'cashout' => NULL, 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 42, 'code' => 'I3', 'name' => 'Modal Awal', 'type' => 'Pasiva', 'income_statement' => '', 'income' => 'Y', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 43, 'code' => 'I4', 'name' => 'Modal Penyertaan', 'type' => 'Pasiva', 'income_statement' => '', 'income' => 'Y', 'cashout' => 'Y', 'status' => 0, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 44, 'code' => 'I5', 'name' => 'Modal Sumbangan', 'type' => 'Pasiva', 'income_statement' => '', 'income' => 'Y', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 45, 'code' => 'I6', 'name' => 'Modal Cadangan', 'type' => 'Pasiva', 'income_statement' => '', 'income' => 'Y', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 47, 'code' => 'J', 'name' => 'Pendapatan', 'type' => 'Pasiva', 'income_statement' => 'PENDAPATAN', 'income' => NULL, 'cashout' => NULL, 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 48, 'code' => 'J1', 'name' => 'Pembayaran Angsuran', 'type' => 'Pasiva', 'income_statement' => '', 'income' => NULL, 'cashout' => NULL, 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 49, 'code' => 'J2', 'name' => 'Pendapatan Lainnya', 'type' => 'Pasiva', 'income_statement' => 'PENDAPATAN', 'income' => 'Y', 'cashout' => 'N', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 50, 'code' => 'K', 'name' => 'Beban', 'type' => 'Aktiva', 'income_statement' => '', 'income' => NULL, 'cashout' => NULL, 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 51, 'code' => 'K1', 'name' => 'Beban Gaji Guru', 'type' => 'Aktiva', 'income_statement' => 'BIAYA', 'income' => 'N', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 52, 'code' => 'K2', 'name' => 'Beban Gaji Karyawan', 'type' => 'Aktiva', 'income_statement' => 'BIAYA', 'income' => 'N', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 53, 'code' => 'K3', 'name' => 'Biaya Listrik dan Air', 'type' => 'Aktiva', 'income_statement' => 'BIAYA', 'income' => 'N', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 54, 'code' => 'K4', 'name' => 'Biaya Transportasi', 'type' => 'Aktiva', 'income_statement' => 'BIAYA', 'income' => 'N', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 55, 'code' => 'K5', 'name' => 'Biaya Iklan', 'type' => 'Aktiva', 'income_statement' => 'BIAYA', 'income' => 'N', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 60, 'code' => 'K10', 'name' => 'Biaya Lainnya', 'type' => 'Aktiva', 'income_statement' => 'BIAYA', 'income' => 'N', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 110, 'code' => 'TRF', 'name' => 'Transfer Antar Kas', 'type' => NULL, 'income_statement' => '', 'income' => NULL, 'cashout' => NULL, 'status' => 0, 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => 111, 'code' => 'A11', 'name' => 'Permisalan', 'type' => 'Aktiva', 'income_statement' => '', 'income' => 'Y', 'cashout' => 'Y', 'status' => 1, 'created_at' => NULL, 'updated_at' => NULL],
        ]);
    }
}
