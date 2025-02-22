<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Http\Requests\Branches\{StoreBranchRequest, UpdateBranchRequest};
use Illuminate\Contracts\View\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\{JsonResponse, RedirectResponse};
use Illuminate\Routing\Controllers\{HasMiddleware, Middleware};

class BranchController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            // 'auth',

            // TODO: uncomment this code if you are using spatie permission
            // new Middleware('permission:branch view', only: ['index', 'show']),
            // new Middleware('permission:branch create', only: ['create', 'store']),
            // new Middleware('permission:branch edit', only: ['edit', 'update']),
            // new Middleware('permission:branch delete', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|JsonResponse
    {
        if (request()->ajax()) {
            $branches = Branch::query();

            return DataTables::of($branches)
                ->addColumn('address', function($row) {
                        return str($row->address)->limit(100);
                    })
				->addColumn('action', 'branches.include.action')
                ->toJson();
        }

        return view('branches.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('branches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBranchRequest $request): RedirectResponse
    {
        
        Branch::create($request->validated());

        return to_route('branches.index')->with('success', __('The branch was created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch): View
    {
        return view('branches.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch): View
    {
        return view('branches.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBranchRequest $request, Branch $branch): RedirectResponse
    {
        
        $branch->update($request->validated());

        return to_route('branches.index')->with('success', __('The branch was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch): RedirectResponse
    {
        try {
            $branch->delete();

            return to_route('branches.index')->with('success', __('The branch was deleted successfully.'));
        } catch (\Exception $e) {
            return to_route('branches.index')->with('error', __("The branch can't be deleted because it's related to another table."));
        }
    }
}
