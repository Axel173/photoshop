<?php
/**
 * Created by PhpStorm.
 * User: Kate
 * Date: 01.03.2019
 * Time: 13:17
 */

namespace App\Repositories;

use App\Models\ShopOrderedProduct as Model;

class ShopOrderedProductRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function addProductsInOrder($order_id, $cart_products)
    {
        $data = [];
        foreach ($cart_products as $cart_product) {
            $product = [
                'order_id' => $order_id,
                'product_id' => $cart_product->id,
                'title' => $cart_product->title,
                'price' => $cart_product->price,
                'discount' => $cart_product->discount,
                'is_published' => true,
            ];
            $data[] = $product;
        }
        $result = $this
            ->startConditions()
            ->insert($data);
        return $result;
    }

}