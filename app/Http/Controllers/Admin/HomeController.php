<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Shop\GetShopAction;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Show Index
     *
     * @return Application|Factory|View
     */
    public function index(GetShopAction $getShop)
    {
        $shops = $getShop([
            'paginate' => 10,
            'new_product' => true,
        ]);

        return view('admin.home.index', compact('shops'));
    }
}
