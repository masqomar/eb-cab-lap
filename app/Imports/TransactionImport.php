<?php

namespace App\Imports;

use App\Models\Branch;
use App\Models\CashType;
use App\Models\Transaction;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransactionImport implements  ToModel, WithHeadingRow
{
    use Importable;
    protected $branches;
    protected $cashTypes;
    protected $accountTypes;

    public function __construct()
    {
        //QUERY UNTUK MENGAMBIL SELURUH DATA USER
        $this->branches = Branch::select('id')->get();
        $this->cashTypes = CashType::select('id')->get();
        $this->accountTypes = CashType::select('id')->get();
    }
    public function model(array $row)
    {
        //KEMUDIAN KITA FILTER MELALUI COLLECTION AGAR TIDAK BANYAK QUERY YANG DIJALANKAN
        //DATA YANG DICARI ADALAH DATA USER BERDASARKAN NIK KARENA YANG MENJADI FOREIGN KEY PADA SISTEM YANG LAMA ADALAH NIK DAN SISTEM BARU ADALAH ID, MAKA KEDUA DATA INI AKAN KITA KONVERSI
        $branch = $this->branches->where('id', $row['branch_id'])->first();
        $fromCashType = $this->cashTypes->where('id', $row['from_cash_type_id'])->first();
        $toCashType = $this->cashTypes->where('id', $row['to_cash_type_id'])->first();
        $accountType = $this->accountTypes->where('id', $row['account_type_id'])->first();
        return new Transaction([
            'code' => $row['code'],
            'branch_id' => $branch->id ?? NULL,
            'date' => $row['date'],
            'amount' => $row['amount'],
            'description' => $row['description'],
            'transaction_type' => $row['transaction_type'],
            'from_cash_type_id' => $fromCashType->id ?? NULL,
            'to_cash_type_id' => $toCashType->id ?? NULL,
            'account_type_id' => $accountType->id ?? NULL,
            'dk' => $row['dk']
        ]);
    }
}
