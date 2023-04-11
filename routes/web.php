<?php
use App\Http\Controllers\Admin;
use App\Http\Controllers\Client;
use App\Http\Controllers\Worker;
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

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->middleware('CheckRole:admin')->name('admin.')->group(function () {
        Route::Resource('users', Admin\UserController::class);
        Route::Resource('bankBranches', Admin\BankBranchController::class);
        Route::Resource('bonusRates', Admin\BonusRateController::class);
        Route::Resource('typeDeposits', Admin\TypeDepositController::class);
        Route::Resource('bankDeposits', Admin\BankDepositController::class);
    });

    Route::prefix('worker')->middleware('CheckRole:worker')->name('worker.')->group(function () {
        Route::get('/profile', [Worker\ProfileController::class, 'show'])->name('profile.show');
        Route::get('/profile/edit', [Worker\ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [Worker\ProfileController::class, 'update'])->name('profile.update');
        Route::Resource('bonusRates', Worker\BonusRateController::class)->only(['index', 'show']);
        Route::Resource('typeDeposits', Worker\TypeDepositController::class)->only(['index', 'show']);
        Route::Resource('bankBranches', Worker\BankBranchController::class)->only(['index', 'show']);
        Route::get('/bankDeposits/archive', [Worker\BankDepositController::class, 'archive'])->name('bankDeposits.archive');
        Route::Resource('bankDeposits', Worker\BankDepositController::class)->except(['edit']);
    });

    Route::prefix('client')->middleware('CheckRole:client')->name('client.')->group(function () {
        Route::get('/profile', [Client\ProfileController::class, 'edit'])->name('profile.edit');
        Route::get('/profile/edit', [Client\ProfileController::class, 'show'])->name('profile.show');
        Route::patch('/profile', [Client\ProfileController::class, 'update'])->name('profile.update');
        Route::Resource('bonusRates', Client\BonusRateController::class)->only(['index', 'show']);
        Route::Resource('typeDeposits', Client\TypeDepositController::class)->only(['index', 'show']);
        Route::get('/bankDeposits/archive', [Client\BankDepositController::class, 'archive'])->name('bankDeposits.archive');
        Route::Resource('bankDeposits', Client\BankDepositController::class)->except(['edit', 'update']);
    });



});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
