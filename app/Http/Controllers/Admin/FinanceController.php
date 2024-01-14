<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Finance\GetShopFinanceAction;
use App\Actions\Finance\GetWithdrawMoneyAction;
use App\Actions\Shop\GetShopAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Actions\Finance\GetShopFinanceAction $internalShop
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request, GetShopFinanceAction $internalShop)
    {
        $request->merge([
            'paginate' => 10,
            'internal' => true,
        ]);

        return view('admin.finance.index', $internalShop());
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Actions\Finance\GetShopFinanceAction $internalShop
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getExternalShop(Request $request, GetShopFinanceAction $internalShop)
    {
        $request->merge([
            'paginate' => 10,
            'overseas' => true,
        ]);

        return view('admin.finance.index', $internalShop());
    }

    public function getWithdrawMoney(
        Request $request,
        GetWithdrawMoneyAction $withdrawMoney,
        GetShopAction $getShopAction
    ) {
        $request->merge(['pagination' => 10]);
        $withdrawMoney = $withdrawMoney();
        $shops = $getShopAction();

        return view('admin.finance.withdraw_money', compact('withdrawMoney', 'shops'));
    }
}
