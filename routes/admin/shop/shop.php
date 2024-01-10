<?php

use App\Http\Controllers\Admin\ShopController;
use Illuminate\Support\Facades\Route;

Route::middleware('is_login')
    ->group(function () {
        Route::prefix('/shop')
            ->name('shop.')
            ->controller(ShopController::class)
            ->group(function () {
                Route::get('new-shop', 'getNewShop')->name('new_shop');
                Route::get('pause-or-cancel-shop', 'getCloseShop')->name('pause_shop');
                Route::get('internal-shop', 'getInternalShop')->name('internal_shop');
                Route::get('overseas-shop', 'getInternalShop')->name('overseas_shop');
            });
});
