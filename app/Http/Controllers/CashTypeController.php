<?php

namespace App\Http\Controllers;

use App\Models\CashType;
use App\Http\Requests\CashTypes\{StoreCashTypeRequest, UpdateCashTypeRequest};
use Illuminate\Contracts\View\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\{JsonResponse, RedirectResponse};
use Illuminate\Routing\Controllers\{HasMiddleware, Middleware};

class CashTypeController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            // 'auth',

            // TODO: uncomment this code if you are using spatie permission
            // new Middleware('permission:cash type view', only: ['index', 'show']),
            // new Middleware('permission:cash type create', only: ['create', 'store']),
            // new Middleware('permission:cash type edit', only: ['edit', 'update']),
            // new Middleware('permission:cash type delete', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|JsonResponse
    {
        if (request()->ajax()) {
            $cashTypes = CashType::query();

            return DataTables::of($cashTypes)
                ->addColumn('action', 'cash-types.include.action')
                ->toJson();
        }

        return view('cash-types.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('cash-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCashTypeRequest $request): RedirectResponse
    {
        
        CashType::create($request->validated());

        return to_route('cash-types.index')->with('success', __('The cash type was created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(CashType $cashType): View
    {
        return view('cash-types.show', compact('cashType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CashType $cashType): View
    {
        return view('cash-types.edit', compact('cashType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCashTypeRequest $request, CashType $cashType): RedirectResponse
    {
        
        $cashType->update($request->validated());

        return to_route('cash-types.index')->with('success', __('The cash type was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CashType $cashType): RedirectResponse
    {
        try {
            $cashType->delete();

            return to_route('cash-types.index')->with('success', __('The cash type was deleted successfully.'));
        } catch (\Exception $e) {
            return to_route('cash-types.index')->with('error', __("The cash type can't be deleted because it's related to another table."));
        }
    }
}
