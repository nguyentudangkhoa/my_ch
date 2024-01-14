<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Order\GetOrderAction;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    const PAGINATION = 10;
    const SHOP_OUT_SEA = 2;
    const SHOP_INTERNAL = 1;

    /**
     * Index
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Actions\Order\GetOrderAction $getOrder
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request, GetOrderAction $getOrder)
    {
        $request->merge([
            'pagination' => self::PAGINATION,
            'shop_type' => self::SHOP_INTERNAL,
        ]);

        return view('admin.orders.index', $getOrder());
    }

    /**
     * Out Sea Order
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Actions\Order\GetOrderAction $getOrder
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function outSeaOrder(Request $request, GetOrderAction $getOrder)
    {
        $request->merge([
            'pagination' => self::PAGINATION,
            'shop_type' => self::SHOP_OUT_SEA,
        ]);

        return view('admin.orders.outseas_order', $getOrder());
    }

    /**
     * Complain
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Actions\Order\GetOrderAction $getOrder
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View\
     */
    public function complainOrReturnOrder(Request $request, GetOrderAction $getOrder)
    {
        $request->merge([
            'pagination' => self::PAGINATION,
            'return_order' => true,
            'is_complain' => true,
        ]);

        return view('admin.orders.complain_return_order', $getOrder());
    }
}
