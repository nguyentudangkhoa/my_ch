<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->name('admin.')->group(function () {
    include('auth/login.php');
    include('home/home.php');
    include('shop/shop.php');
    include('product/product.php');
    include('order/order.php');
});
