<?php

namespace App\Actions\Finance;

use App\Models\Order;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GetShopFinanceAction
{
    /**
     * @return array
     */
    public function __invoke(): array
    {
        return [
            'shops' => $this->getFinanceShop(request()->all()),
            'financeSums' => $this->sumOrderPaymentPrice()
        ];
    }

    /**
     *
     * @param array $filter
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    private function getFinanceShop(array $filter)
    {
        $paginate = Arr::get($filter, 'paginate', 0);

        $shops = Shop::query()->with('orders');

        $this->processingQuery($shops, $filter);

        if ($paginate) {
            return $shops->paginate($paginate);
        }

        return $shops->get();
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $shops
     * @param array $filter
     * @return void
     */
    private function processingQuery(Builder &$shops , array $filter): void
    {
        $shopName = Arr::get($filter, 'name', null);
        $overseas = Arr::get($filter, 'overseas', false);
        $internal = Arr::get($filter, 'internal', false);

        if ($shopName) {
            $shops->where(function ($shops) use ($shopName) {
                $shops->where('name', 'like', "%$shopName%");
            });
        }

        if ($internal) {
            $shops->where('shop_type', 1);
        }

        if ($overseas) {
            $shops->where('shop_type', 2);
        }
    }

    private function sumOrderPaymentPrice()
    {
        $financeMonth = Order::query()->with('shop')
                            ->whereHas('shop', function ($query) {
                                $this->processingQuery($query, request()->all());
                        })->whereMonth('created_at', '>=', now()->month)
                        ->whereYear('created_at', now()->year)
                        ->where('status', 4)
                        ->sum('payment_price');

        $financeAll = Order::query()->with('shop')
                        ->whereHas('shop', function ($query) {
                            $this->processingQuery($query, request()->all());
                        })->where('status', 4)->sum('payment_price');
        $shippingPrice = Order::query()->with('shop')
                        ->whereHas('shop', function ($query) {
                            $this->processingQuery($query, request()->all());
                        })->where('status', 4)->sum('shipping_price');

        $financeYear = Order::query()->with('shop')
                        ->whereHas('shop', function ($query) {
                            $this->processingQuery($query, request()->all());
                        })->whereYear('created_at', now()->year)
                        ->where('status', 4)
                        ->sum('payment_price');

        $financeWeek = Order::query()->with('shop')
                        ->whereHas('shop', function ($query) {
                            $this->processingQuery($query, request()->all());
                        })
                        ->whereBetween('created_at', [
                            now()->startOfWeek(Carbon::SUNDAY),
                            now()->endOfWeek(Carbon::SATURDAY)
                        ])->where('status', 4)
                        ->sum('payment_price');

        return [
            $financeWeek,
            $financeMonth,
            $financeYear,
            $shippingPrice,
            $financeAll,
        ];
    }
}
