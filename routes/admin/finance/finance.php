<?php

use App\Http\Controllers\Admin\FinanceController;
use Illuminate\Support\Facades\Route;

Route::middleware('is_login')->prefix('finance')->name('finance.')->group(function () {
    Route::get('', [FinanceController::class, 'index'])->name('internal_shop');
    Route::get('outsea-order', [FinanceController::class, 'getExternalShop'])->name('outsea_order');
    Route::get('withdraw-history', [FinanceController::class, 'getWithdrawMoney'])->name('withdraw_money');
});
