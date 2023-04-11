<?php

use App\Http\Controllers\Admin\BankBranchController;
use App\Http\Controllers\Admin\BonusRateController;
use App\Http\Controllers\Admin\TypeDepositController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::prefix('admin')->middleware(['auth', 'CheckRole:admin'])->name('admin.')->group(function () {
//    Route::apiResource('branches', BankBranchController::class);
    Route::Resource('users', UserController::class);
    Route::Resource('bankBranches', BankBranchController::class);
    Route::Resource('bonusRates', BonusRateController::class);
    Route::Resource('typeDeposits', TypeDepositController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
