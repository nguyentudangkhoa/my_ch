<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('is_login')->prefix('product')->name('product.')->group(function () {
    Route::get('', [ProductController::class, 'index'])->name('index');
    Route::get('/all-product', [ProductController::class, 'getProduct'])->name('all_product');
    Route::get('/violation-product', [ProductController::class, 'getIllegalProduct'])->name('violation_product');
    Route::get('/gg-product', [ProductController::class, 'getGGProduct'])->name('gg_product');
});
