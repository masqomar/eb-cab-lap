<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        // Data pemasukan & pengeluaran per bulan
        $transactionAll = Transaction::selectRaw("DATE_FORMAT(date, '%Y-%m') as month, transaction_type, SUM(amount) as total")
            ->groupBy('month', 'transaction_type')
            ->orderBy('month')
            ->get();

        // Data pemasukan & pengeluaran per cabang
        $branchAll = Transaction::selectRaw("branch_id, transaction_type, SUM(amount) as total")
            ->with('branch:id,name')
            ->groupBy('branch_id', 'transaction_type')
            ->get();

        // Data pemasukan & pengeluaran per akun
        $accountTypeAll = Transaction::selectRaw("account_type_id, SUM(amount) as total")
            ->with('account_type:id,name')
            ->groupBy('account_type_id')
            ->get();

        // Laba Rugi per bulan
        $profitLossAll = Transaction::selectRaw("DATE_FORMAT(date, '%Y-%m') as month, SUM(CASE WHEN transaction_type = 'Pemasukan' THEN amount ELSE 0 END) - SUM(CASE WHEN transaction_type = 'Pengeluaran' THEN amount ELSE 0 END) as profit")
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Saldo berjalan (Cash Flow)
        $cashFlowAll = Transaction::selectRaw("DATE_FORMAT(date, '%Y-%m') as month, SUM(CASE WHEN transaction_type = 'Pemasukan' THEN amount ELSE -amount END) as balance")
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Data perbandingan bulan ini vs bulan lalu
        $comparisonAll = Transaction::selectRaw("DATE_FORMAT(date, '%Y-%m') as month, transaction_type, SUM(amount) as total")
            ->whereBetween('date', [now()->subMonths(2)->startOfMonth(), now()->endOfMonth()])
            ->groupBy('month', 'transaction_type')
            ->orderBy('month')
            ->get();

        $userBranch = auth()->user()->branch_id; // Ambil branch_id user yang login

        // Data pemasukan & pengeluaran per bulan (hanya untuk cabang user)
        $transactions = Transaction::selectRaw("DATE_FORMAT(date, '%Y-%m') as month, transaction_type, SUM(amount) as total")
            ->where('branch_id', $userBranch)
            ->groupBy('month', 'transaction_type')
            ->orderBy('month')
            ->get();

        // Data pemasukan & pengeluaran per akun (hanya untuk cabang user)
        $accountTypes = Transaction::selectRaw("account_type_id, SUM(amount) as total")
            ->where('branch_id', $userBranch)
            ->with('account_type:id,name')
            ->groupBy('account_type_id')
            ->get();

        // Laba Rugi per bulan (hanya untuk cabang user)
        $profitLoss = Transaction::selectRaw("DATE_FORMAT(date, '%Y-%m') as month, SUM(CASE WHEN transaction_type = 'Pemasukan' THEN amount ELSE 0 END) - SUM(CASE WHEN transaction_type = 'Pengeluaran' THEN amount ELSE 0 END) as profit")
            ->where('branch_id', $userBranch)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Saldo berjalan (Cash Flow) (hanya untuk cabang user)
        $cashFlow = Transaction::selectRaw("DATE_FORMAT(date, '%Y-%m') as month, SUM(CASE WHEN transaction_type = 'Pemasukan' THEN amount ELSE -amount END) as balance")
            ->where('branch_id', $userBranch)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $regionals = Branch::where('id', $userBranch)->first();
        $regional = $regionals->name;

        return view('dashboard', compact('transactionAll', 'branchAll', 'accountTypeAll', 'profitLossAll', 'cashFlowAll', 'comparisonAll', 'transactions', 'accountTypes', 'profitLoss', 'cashFlow', 'regional'));
    }
}
