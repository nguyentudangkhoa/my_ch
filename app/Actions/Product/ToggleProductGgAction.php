<?php

namespace App\Actions\Product;

use App\Models\Product;

class ToggleProductGgAction
{
    /**
     * Invoke the class
     *
     * @param int $id
     * @return bool
     */
    public function __invoke(int $id): bool
    {
        return $this->toggleGgProduct($id);
    }

    /**
     * toggle Gg Product
     *
     * @param int $id
     * @return bool
     */
    public function toggleGgProduct(int $id): bool
    {
        $product = Product::find($id);

        if (! $product->update(['ggsp' => ! $product->ggsp])) {
            return false;
        }

        return true;
    }
}
