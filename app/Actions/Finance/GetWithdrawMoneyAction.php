<?php

namespace App\Actions\Finance;

use App\Models\WalletDetail;
use Illuminate\Support\Arr;

class GetWithdrawMoneyAction
{
    public function __invoke()
    {
        return $this->getWithdrawMoney(request()->all());
    }

    public function getWithdrawMoney(array $filter)
    {
        $shopId = Arr::get($filter, 'shopId', null);
        $keyword = Arr::get($filter, 'keyword', null);
        $pagination = Arr::get($filter, 'pagination', 0);

        $query = WalletDetail::query()->with('shop');

        if ($shopId) {
            $query->where('shop_id', 'id');
        }

        if ($keyword) {
            $query->where(function ($query) use ($keyword) {
               $query->whereHas('shop',function ($query) use ($keyword) {
                   $query->where('name', 'like', "%$keyword%");
               });
            });
        }

        if ($pagination) {
            return $query->latest('created_at')->paginate($pagination);
        }

        return $query->get();
    }
}
