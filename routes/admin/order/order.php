<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('is_login')->prefix('order')->name('order.')->group(function () {
    Route::get('', [OrderController::class, 'index'])->name('index');
    Route::get('outsea-order', [OrderController::class, 'outSeaOrder'])->name('outsea_order');
    Route::get('complain-return-order', [OrderController::class, 'complainOrReturnOrder'])->name('complain_return_order');
});
