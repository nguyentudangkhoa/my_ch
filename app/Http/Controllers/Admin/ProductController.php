<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Product\GetProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\GetProductShopRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @param \App\Http\Requests\Admin\Product\GetProductShopRequest $request
     * @param \App\Actions\Admin\Product\GetProduct $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(GetProductShopRequest $request, GetProduct $product)
    {
        $data = array_merge($request->validated(), [
            'paginate' => 10,
//            'new_product' => true,
        ]);

        $categories = Category::get();

        $products = $product($data);

        return view('admin.product.index', compact('products', 'categories'));
    }

    /**
     * @param \App\Http\Requests\Admin\Product\GetProductShopRequest $request
     * @param \App\Actions\Admin\Product\GetProduct $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getProduct(GetProductShopRequest $request, GetProduct $product)
    {
        $data = array_merge($request->validated(), ['paginate' => 10]);

        $categories = Category::get();

        $products = $product($data);

        return view('admin.product.all_product', compact('products', 'categories'));
    }


    /**
     * Summary of getIllegalProduct
     *
     * @param \App\Http\Requests\Admin\Product\GetProductShopRequest $request
     * @param \App\Actions\Admin\Product\GetProduct $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getIllegalProduct(GetProductShopRequest $request, GetProduct $product)
    {
        $data = array_merge($request->validated(), [
            'paginate' => 10,
            'is_violation' => true
        ]);

        $categories = Category::get();

        $products = $product($data);

        return view('admin.product.violation_product', compact('products', 'categories'));
    }

    /**
     * Summary of getGGProduct
     *
     * @param \App\Http\Requests\Admin\Product\GetProductShopRequest $request
     * @param \App\Actions\Admin\Product\GetProduct $product
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getGGProduct(GetProductShopRequest $request, GetProduct $product)
    {
        $data = array_merge($request->validated(), [
            'paginate' => 10,
            'ggsp' => 1,
        ]);

        $categories = Category::get();

        $products = $product($data);

        return view('admin.product.gg_product', compact('products', 'categories'));
    }
}
