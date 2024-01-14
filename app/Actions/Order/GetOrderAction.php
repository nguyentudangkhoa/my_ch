<?php

namespace App\Actions\Order;

use App\Models\Order;
use Illuminate\Support\Arr;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class GetOrderAction
{
    public function __invoke()
    {
        return [
            'orders' => $this->getOrders(request()->all()),
            'countOrders' => $this->getOrders([
                'pagination' => request()->all('pagination'),
                'shop_type' => request()->all('shop_type'),
            ])->total(),
            'countConfirmOrder' => $this->getOrders(array_merge(request()->all(), ['status' => 1]))->total(),
            'countWaitingProduct' => $this->getOrders(array_merge(request()->all(), ['status' => 2]))->total(),
            'countOnDelivery' => $this->getOrders(array_merge(request()->all(), ['status' => 3]))->total(),
            'countDelivery' => $this->getOrders(array_merge(request()->all(), ['status' => 4]))->total(),
            'countCancel' => $this->getOrders(array_merge(request()->all(), ['status' => 5]))->total(),
        ];
    }

    /**
     * Get Order result
     *
     * @param array $filter
     * @return LengthAwarePaginator|Builder[]|Collection
     */
    public function getOrders(array $filter)
    {
        $shopType = Arr::get($filter, 'shop_type', null);
        $status = Arr::get($filter, 'status', null);
        $pagination = Arr::get($filter, 'pagination', 0);
        $orderCode = Arr::get($filter, 'order_code', 0);
        $keyword = Arr::get($filter, 'keyword', 0);
        $orderReturn = Arr::get($filter, 'order_return', false);
        $isComplain = Arr::get($filter, 'is_complain', false);
        $orders = Order::with(['orderDetails.product', 'shop', 'user']);

        if ($shopType) {
            $orders->whereHas('shop', function ($query) use ($shopType) {
                $query->where('shop_type', $shopType);
            });
        }

        if ($keyword) {
            $orders->where(function ($query) use ($keyword) {
               $query->where('order_code', 'like', "%$keyword%");
            });
        }

        if ($status) {
            $orders->where('status', $status);
        }

        if ($orderReturn && ! $isComplain) {
            $orders->where('return_order', 1);
        }

        if ($isComplain && ! $orderReturn) {
            $orders->where('is_complain', 1);
        }

        if ($isComplain && $orderReturn) {
            $orders->where(function ($query) {
                $query->where('is_complain', 1)
                    ->orWhere('return_order', 1);
            });
        }

        if ($orderCode) {
            $orders->where('order_code', $orderCode);
        }

        if ($pagination) {
            return $orders->paginate(10);
        }

        return $orders->get();
    }
}
