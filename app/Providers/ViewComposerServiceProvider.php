<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['users.create', 'users.edit'], function ($view) {
            return $view->with(
                'roles',
                Role::select('id', 'name')->get()
            );
        });

		View::composer(['transactions.create', 'transactions.edit'], function ($view) {
            return $view->with(
                'branches',
                \App\Models\Branch::select('id', 'name')->get()
            );
        });

		View::composer(['transactions.create', 'transactions.edit'], function ($view) {
            return $view->with(
                'cashTypes',
                \App\Models\CashType::select('id')->get()
            );
        });

		View::composer(['transactions.create', 'transactions.edit'], function ($view) {
            return $view->with(
                'cashTypes',
                \App\Models\CashType::select('id')->get()
            );
        });

		View::composer(['transactions.create', 'transactions.edit'], function ($view) {
            return $view->with(
                'accountTypes',
                \App\Models\AccountType::select('id', 'code')->get()
            );
        });

        View::composer(['incomes.create', 'incomes.edit'], function ($view) {
            return $view->with(
                'cashTypes',
                \App\Models\CashType::select('id', 'name')->where('status', 1)->where('income', 'Y')->get()
            );
        });

        View::composer(['incomes.create', 'incomes.edit'], function ($view) {
            return $view->with(
                'accountTypes',
                \App\Models\AccountType::select('id', 'name','income', 'status')->where('income', 'Y')->where('status', 1)->get()
            );
        });

        View::composer(['cashouts.create', 'cashouts.edit'], function ($view) {
            return $view->with(
                'cashTypes',
                \App\Models\CashType::select('id', 'name')->where('status', 1)->where('cashout', 'Y')->get()
            );
        });

        View::composer(['cashouts.create', 'cashouts.edit'], function ($view) {
            return $view->with(
                'accountTypes',
                \App\Models\AccountType::select('id', 'name',)->where('cashout', 'Y')->where('status', 1)->get()
            );
        });

	}
}