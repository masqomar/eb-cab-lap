<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use App\Http\Requests\AccountTypes\{StoreAccountTypeRequest, UpdateAccountTypeRequest};
use Illuminate\Contracts\View\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\{JsonResponse, RedirectResponse};
use Illuminate\Routing\Controllers\{HasMiddleware, Middleware};

class AccountTypeController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            // 'auth',

            // TODO: uncomment this code if you are using spatie permission
            // new Middleware('permission:account type view', only: ['index', 'show']),
            // new Middleware('permission:account type create', only: ['create', 'store']),
            // new Middleware('permission:account type edit', only: ['edit', 'update']),
            // new Middleware('permission:account type delete', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|JsonResponse
    {
        if (request()->ajax()) {
            $accountTypes = AccountType::query();

            return DataTables::of($accountTypes)
                ->addColumn('action', 'account-types.include.action')
                ->toJson();
        }

        return view('account-types.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('account-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountTypeRequest $request): RedirectResponse
    {
        
        AccountType::create($request->validated());

        return to_route('account-types.index')->with('success', __('The account type was created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(AccountType $accountType): View
    {
        return view('account-types.show', compact('accountType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccountType $accountType): View
    {
        return view('account-types.edit', compact('accountType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountTypeRequest $request, AccountType $accountType): RedirectResponse
    {
        
        $accountType->update($request->validated());

        return to_route('account-types.index')->with('success', __('The account type was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccountType $accountType): RedirectResponse
    {
        try {
            $accountType->delete();

            return to_route('account-types.index')->with('success', __('The account type was deleted successfully.'));
        } catch (\Exception $e) {
            return to_route('account-types.index')->with('error', __("The account type can't be deleted because it's related to another table."));
        }
    }
}
