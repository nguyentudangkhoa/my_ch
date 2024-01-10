<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with(['orderDetails.product', 'shop', 'user'])->whereHas('shop', function ($query) {
            $query->where('shop_type', 1);
        });

        if (request()->has('status') && $status = request()->query('status')) {
            $orders->where('status', $status);
        }

        if ($request->has('order_code')) {
            $orders->where('order_code', $request->query('order_code'));
        }

        return view('admin.orders.index', ['orders' => $orders->paginate(10)]);
    }

    public function outSeaOrder(Request $request)
    {
        $orders = Order::with(['orderDetails.product', 'shop', 'user'])->whereHas('shop', function ($query) {
            $query->where('shop_type', 2);
        });

        if (request()->has('status') && $status = request()->query('status')) {
            $orders->where('status', $status);
        }


        if ($request->has('order_code')) {
            $orders->where('order_code', $request->query('order_code'));
        }

        return view('admin.orders.index', ['orders' => $orders->paginate(10)]);
    }
}
