<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCashoutRequest;
use App\Http\Requests\StoreIncomeRequest;
use App\Models\Transaction;
use App\Http\Requests\Transactions\{StoreTransactionRequest, UpdateTransactionRequest};
use Illuminate\Contracts\View\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\{JsonResponse, RedirectResponse, Request};
use Illuminate\Routing\Controllers\{HasMiddleware, Middleware};
use Illuminate\Support\Facades\Validator;

class CashoutController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            // 'auth',

            // TODO: uncomment this code if you are using spatie permission
            // new Middleware('permission:transaction view', only: ['index', 'show']),
            // new Middleware('permission:transaction create', only: ['create', 'store']),
            // new Middleware('permission:transaction edit', only: ['edit', 'update']),
            // new Middleware('permission:transaction delete', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|JsonResponse
    {
        if (request()->ajax()) {
            $cashouts = Transaction::with(['branch:id,name', 'from_cash_type:id,name', 'account_type:id,name',])
            ->where('branch_id', auth()->user()->branch_id)
            ->where('transaction_type', 'Pengeluaran');

            return DataTables::of($cashouts)
                ->addColumn('description', function ($row) {
                    return str($row->description)->limit(100);
                })
                ->addColumn('branch', function ($row) {
                    return $row?->branch?->name ?? '';
                })->addColumn('from_cash_type', function ($row) {
                    return $row?->from_cash_type?->name ?? '';
                })->addColumn('account_type', function ($row) {
                    return $row?->account_type?->name ?? '';
                })->addColumn('action', 'cashouts.include.action')
                ->toJson();
        }

        return view('cashouts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('cashouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCashoutRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $ambilData = Transaction::where('transaction_type', 'Pengeluaran')->count();
        $kodeUnik = 'TKK' . str_pad($ambilData + 1, 4, "0", STR_PAD_LEFT);

        // Menambahkan nilai tambahan
        $validatedData['code'] = $kodeUnik; // membuat code
        $validatedData['branch_id'] = auth()->user()->branch_id; // branch_id dari user yang sedang login
        $validatedData['transaction_type'] = 'Pengeluaran'; // Tipe transaksi
        $validatedData['dk'] = 'K'; // Kredit (K)

        // Menyimpan data ke database
        $transaction = Transaction::create($validatedData);

        return to_route('cashouts.index')->with('success', __('The transaction was created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction): View
    {
        $transaction->load(['branch:id,name', 'from_cash_type:id', 'from_cash_type:id', 'account_type:id,code',]);

        return view('cashouts.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction): View
    {
        $transaction->load(['branch:id,name', 'from_cash_type:id', 'from_cash_type:id', 'account_type:id,code',]);

        return view('cashouts.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction): RedirectResponse
    {

        $transaction->update($request->validated());

        return to_route('cashouts.index')->with('success', __('The transaction was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction): RedirectResponse
    {
        try {
            $transaction->delete();

            return to_route('cashouts.index')->with('success', __('The transaction was deleted successfully.'));
        } catch (\Exception $e) {
            return to_route('cashouts.index')->with('error', __("The transaction can't be deleted because it's related to another table."));
        }
    }
}
