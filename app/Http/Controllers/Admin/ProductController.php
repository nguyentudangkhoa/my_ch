<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Product\GetProductAction;
use App\Actions\Product\ToggleProductGgAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\GetProductShopRequest;
use App\Http\Requests\Admin\Product\ToggleProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * @param \App\Http\Requests\Admin\Product\GetProductShopRequest $request
     * @param \App\Actions\Product\GetProductAction $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(GetProductShopRequest $request, GetProductAction $product)
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
     * @param \App\Actions\Product\GetProductAction $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getProduct(GetProductShopRequest $request, GetProductAction $product)
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
     * @param \App\Actions\Product\GetProductAction $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getIllegalProduct(GetProductShopRequest $request, GetProductAction $product)
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
     * @param \App\Actions\Product\GetProductAction $product
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getGGProduct(GetProductShopRequest $request, GetProductAction $product)
    {
        $data = array_merge($request->validated(), [
            'paginate' => 10,
            'ggsp' => 1,
        ]);

        $categories = Category::get();

        $products = $product($data);

        return view('admin.product.gg_product', compact('products', 'categories'));
    }

    /**
     * ToggleProduct GG
     *
     * @param \App\Http\Requests\Admin\Product\ToggleProductRequest $request
     * @param \App\Actions\Product\ToggleProductGgAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleProductGg(ToggleProductRequest $request, ToggleProductGgAction $action)
    {
        if (! $action($request->input('id'))) {
            return response()->json([
                STATUS => __('message.error'),
            ], Response::HTTP_BAD_REQUEST);
        }

        return response()->json([
            STATUS => __('message.success'),
        ], Response::HTTP_OK);
    }
}
