<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncomeRequest;
use App\Models\Transaction;
use App\Http\Requests\Transactions\{StoreTransactionRequest, UpdateTransactionRequest};
use Illuminate\Contracts\View\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\{JsonResponse, RedirectResponse, Request};
use Illuminate\Routing\Controllers\{HasMiddleware, Middleware};
use Illuminate\Support\Facades\Validator;

class IncomeController extends Controller implements HasMiddleware
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
            $incomes = Transaction::with(['branch:id,name', 'to_cash_type:id,name', 'account_type:id,name',])
            ->where('branch_id', auth()->user()->branch_id)
            ->where('transaction_type', 'Pemasukan');

            return DataTables::of($incomes)
                ->addColumn('description', function ($row) {
                    return str($row->description)->limit(100);
                })
                ->addColumn('branch', function ($row) {
                    return $row?->branch?->name ?? '';
                })->addColumn('to_cash_type', function ($row) {
                    return $row?->to_cash_type?->name ?? '';
                })->addColumn('account_type', function ($row) {
                    return $row?->account_type?->name ?? '';
                })->addColumn('action', 'incomes.include.action')
                ->toJson();
        }

        return view('incomes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('incomes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncomeRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $ambilData = Transaction::where('transaction_type', 'Pemasukan')->count();
        $kodeUnik = 'TKD' . str_pad($ambilData + 1, 4, "0", STR_PAD_LEFT);

        // Menambahkan nilai tambahan
        $validatedData['code'] = $kodeUnik; // membuat code
        $validatedData['branch_id'] = auth()->user()->branch_id; // branch_id dari user yang sedang login
        $validatedData['transaction_type'] = 'Pemasukan'; // Tipe transaksi
        $validatedData['dk'] = 'D'; // Debit (D)

        // Menyimpan data ke database
        $transaction = Transaction::create($validatedData);

        return to_route('incomes.index')->with('success', __('The transaction was created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction): View
    {
        $transaction->load(['branch:id,name', 'from_cash_type:id', 'to_cash_type:id', 'account_type:id,code',]);

        return view('incomes.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction): View
    {
        $transaction->load(['branch:id,name', 'from_cash_type:id', 'to_cash_type:id', 'account_type:id,code',]);

        return view('incomes.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction): RedirectResponse
    {

        $transaction->update($request->validated());

        return to_route('incomes.index')->with('success', __('The transaction was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction): RedirectResponse
    {
        try {
            $transaction->delete();

            return to_route('incomes.index')->with('success', __('The transaction was deleted successfully.'));
        } catch (\Exception $e) {
            return to_route('incomes.index')->with('error', __("The transaction can't be deleted because it's related to another table."));
        }
    }
}
