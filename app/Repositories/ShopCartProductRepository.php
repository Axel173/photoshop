<?php
/**
 * Created by PhpStorm.
 * User: Kate
 * Date: 01.03.2019
 * Time: 13:17
 */

namespace App\Repositories;

use App\Models\ShopCartProduct as Model;

class ShopCartProductRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function addToCart($cart_id, $product)
    {
        $result = $this
            ->startConditions()::create(array(
                'product_id' => $product->id,
                'cart_id' => $cart_id,
                'is_published' => true,
            ));

        return $result;
    }

}