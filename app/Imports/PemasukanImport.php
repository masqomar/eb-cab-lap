<?php

namespace App\Imports;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PemasukanImport implements ToModel, WithHeadingRow
{
    use Importable;
    
    protected $users;
    public function __construct()
    {
        //QUERY UNTUK MENGAMBIL SELURUH DATA USER
        $this->users = User::select('id', 'id')->get();
    }

    public function model(array $row)
    {
        //KEMUDIAN KITA FILTER MELALUI COLLECTION AGAR TIDAK BANYAK QUERY YANG DIJALANKAN
        //DATA YANG DICARI ADALAH DATA USER BERDASARKAN NIK KARENA YANG MENJADI FOREIGN KEY PADA SISTEM YANG LAMA ADALAH NIK DAN SISTEM BARU ADALAH ID, MAKA KEDUA DATA INI AKAN KITA KONVERSI
        $user = $this->users->where('id', $row['id'])->first();
        return new Transaction([
            'branch_id' => $user->branch_id ?? NULL,
            'code' => $row['code'],
            'date' => $row['date'],
            'amount' => $row['amount'],
            'transaction_type' => $row['transaction_type'],
            'to_cash_type_id' => $row['to_cash_type_id'],
            'account_type_id' => $row['account_type_id'],
            'description' => $row['description'],
            'dk' => 'D'
        ]);
    }

}
