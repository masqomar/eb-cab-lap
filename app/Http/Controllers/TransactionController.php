<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\Transactions\{StoreTransactionRequest, UpdateTransactionRequest};
use Illuminate\Contracts\View\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\{JsonResponse, RedirectResponse};
use Illuminate\Routing\Controllers\{HasMiddleware, Middleware};

class TransactionController extends Controller implements HasMiddleware
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
            $transactions = Transaction::with(['branch:id,name', 'from_cash_type:id', 'to_cash_type:id', 'account_type:id,name', ]);

            return DataTables::of($transactions)
                ->addColumn('description', function($row) {
                        return str($row->description)->limit(100);
                    })
				->addColumn('branch', function ($row) {
                    return $row?->branch?->name ?? '';
                })->addColumn('from_cash_type', function ($row) {
                    return $row?->from_cash_type?->id ?? '';
                })->addColumn('to_cash_type', function ($row) {
                    return $row?->to_cash_type?->id ?? '';
                })->addColumn('account_type', function ($row) {
                    return $row?->account_type?->name ?? '';
                })->addColumn('action', 'transactions.include.action')
                ->toJson();
        }

        return view('transactions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request): RedirectResponse
    {
        
        Transaction::create($request->validated());

        return to_route('transactions.index')->with('success', __('The transaction was created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction): View
    {
        $transaction->load(['branch:id,name', 'from_cash_type:id', 'to_cash_type:id', 'account_type:id,code', ]);

		return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction): View
    {
        $transaction->load(['branch:id,name', 'from_cash_type:id', 'to_cash_type:id', 'account_type:id,code', ]);

		return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction): RedirectResponse
    {
        
        $transaction->update($request->validated());

        return to_route('transactions.index')->with('success', __('The transaction was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction): RedirectResponse
    {
        try {
            $transaction->delete();

            return to_route('transactions.index')->with('success', __('The transaction was deleted successfully.'));
        } catch (\Exception $e) {
            return to_route('transactions.index')->with('error', __("The transaction can't be deleted because it's related to another table."));
        }
    }
}
