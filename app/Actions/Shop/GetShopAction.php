<?php

namespace App\Actions\Shop;

use App\Models\Shop;
use Illuminate\Support\Arr;

class GetShopAction
{
    public function __invoke(array $request = [])
    {
        return $this->getShop($request);
    }

    public function getShop(array $request = [])
    {
        $keyword = Arr::get($request, 'keyword', null);
        $paginate = Arr::get($request, 'paginate', 0);
        $newStatus = Arr::get($request, 'new_status', false);
        $isClose = Arr::get($request, 'is_close', false);
        $overseas = Arr::get($request, 'overseas', false);
        $internal = Arr::get($request, 'internal', false);

        $query = Shop::query()->with('orders');

        if ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('shop_title', 'like', "%$keyword%")
                    ->orWhere('email', 'like', "%$keyword%")
                    ->orWhere('address', 'like', "%$keyword%")
                    ->orWhere('phone_number', 'like', "%$keyword%");
            });
        }

        if ($isClose) {
            $query->where(function ($query) use ($isClose) {
                $query->where('is_cancel', 1)
                    ->orWhere('is_pause', 1);
            });
        } else {
            $query->where(function ($query) use ($isClose) {
                $query->where('is_cancel', '!=', 1)
                    ->where('is_pause', '!=', 1);
            });
        }

        if ($internal) {
            $query->where('shop_type', 1);
        }

        if ($overseas) {
            $query->where('shop_type', 2);
        }

        if ($newStatus) {
            $query->where('created_at', '<=', now()->subDays(3)->toDateTimeString());
        }

        if ($paginate) {
            return $query->paginate($paginate);
        }

        return $query->get();
    }
}
