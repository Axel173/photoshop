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

    public function deleteFromCart($id, $cart_id)
    {
        $cart_product = $this->startConditions()
            //->find($id)
            ->where(['cart_id' => $cart_id, 'id' => $id]);
        if ($cart_product) {
            $result = $cart_product->delete();
            return $result;
        }
        //return $result[0]->product()->get();
        return false;
    }

}