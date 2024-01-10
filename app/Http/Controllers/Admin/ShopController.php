<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Shop\GetShop;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\GetNewShopRequest;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Get new shop
     *
     * @param \App\Http\Requests\Admin\Shop\GetNewShopRequest $request
     * @param \App\Actions\Admin\Shop\GetShop $shop
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getNewShop(GetNewShopRequest $request, GetShop $shop)
    {
        $data = array_merge($request->validated(), [
            'paginate' => 10,
            'new_status' => true,
        ]);

        $shops = $shop($data);

        return view('admin.shop.index', compact('shops'));
    }

    /**
     * Get close shop
     *
     * @param \App\Http\Requests\Admin\Shop\GetNewShopRequest $request
     * @param \App\Actions\Admin\Shop\GetShop $shop
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getCloseShop(GetNewShopRequest $request, GetShop $shop)
    {
        $data = array_merge($request->validated(), [
            'paginate' => 10,
            'is_close' => true,
        ]);

        $shops = $shop($data);

        return view('admin.shop.cancel_shop', compact('shops'));
    }

    /**
     * @param \App\Http\Requests\Admin\Shop\GetNewShopRequest $request
     * @param \App\Actions\Admin\Shop\GetShop $shop
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getInternalShop(GetNewShopRequest $request, GetShop $shop)
    {
        $data = array_merge($request->validated(), [
            'paginate' => 10,
            'internal' => true,
        ]);

        $shops = $shop($data);

        return view('admin.finance.index', compact('shops'));
    }

    /**
     * @param \App\Http\Requests\Admin\Shop\GetNewShopRequest $request
     * @param \App\Actions\Admin\Shop\GetShop $shop
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getOutSeaShop(GetNewShopRequest $request, GetShop $shop)
    {
        $data = array_merge($request->validated(), [
            'paginate' => 10,
            'overseas' => true,
        ]);

        $shops = $shop($data);

        return view('admin.finance.overseas', compact('shops'));
    }
}
