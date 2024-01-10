<?php

namespace App\Actions\Admin\Product;

use App\Models\Product;
use Illuminate\Support\Arr;

class GetProduct
{
    public function __invoke(array $request = [])
    {
        return $this->getProduct($request);
    }

    public function getProduct(array $request = [])
    {
        $paginate = Arr::get($request, 'paginate', 0);
        $categoryId = Arr::get($request, 'category_id', 0);
        $listId = Arr::get($request, 'list_id', 0);
        $itemId = Arr::get($request, 'item_id', 0);
        $shopId = Arr::get($request, 'shop_id', 0);
        $keyword = Arr::get($request, 'keyword', null);
        $newProduct = Arr::get($request, 'new_product', false);
        $violation = Arr::get($request, 'is_violation', false);
        $ggProduct = Arr::get($request, 'ggsp', false);
        $query = Product::query();

        if ($keyword) {
            $query->where(function ($query) use ($keyword) {
               $query->where('name', 'like', "%$keyword%")
                   ->orWhere('product_code', 'like', "%$keyword%");
            });
        }

        if ($violation) {
            $query->where('is_violation', $violation);
        }

        if ($ggProduct) {
            $query->where('ggsp', $ggProduct);
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($itemId) {
            $query->where('item_id', $itemId);
        }

        if ($listId) {
            $query->where('list', $listId);
        }

        if ($shopId) {
            $query->where('shop_id', $shopId);
        }

        if ($newProduct) {
            $query->where('created_at', '<=', now()->subDays(3)->toDateTimeString());
        }

        if ($paginate) {
            return $query->paginate($paginate);
        }

        return $query->get();
    }
}
