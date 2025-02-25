<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/profile', App\Http\Controllers\ProfileController::class)->name('profile');

    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('roles', App\Http\Controllers\RoleAndPermissionController::class);
});

Route::middleware(['auth', 'permission:test view'])->get('/tests', function () {
    dd('This is just a test and an example for permission and sidebar menu. You can remove this line on web.php, config/permission.php and config/generator.php');
})->name('tests.index');

Route::resource('branches', App\Http\Controllers\BranchController::class)->middleware('auth');
Route::resource('account-types', App\Http\Controllers\AccountTypeController::class)->middleware('auth');
Route::resource('cash-types', App\Http\Controllers\CashTypeController::class)->middleware('auth');
Route::resource('transactions', App\Http\Controllers\TransactionController::class)->middleware('auth');
Route::resource('incomes', App\Http\Controllers\IncomeController::class)->middleware('auth');
Route::resource('cashouts', App\Http\Controllers\CashoutController::class)->middleware('auth');