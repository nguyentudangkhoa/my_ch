<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware('is_login')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
});
