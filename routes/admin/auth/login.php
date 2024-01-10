<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;

Route::name('auth.')->group(function () {
    Route::middleware('not_login')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
    });

    Route::middleware('is_login')->group(function () {
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    });
});
