<?php
/**
 * Created by PhpStorm.
 * User: Kate
 * Date: 01.03.2019
 * Time: 13:17
 */

namespace App\Repositories;

use App\Models\ShopCart as Model;

class ShopCartRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function createNewCart()
    {
        $result = $this
            ->startConditions()::create(array(
                'is_published' => true,
            ));

        return $result;
    }

    public function getProducts($cart_id)
    {
        $cart = $this->startConditions()
            ->find($cart_id);
        if ($cart) {
            $result = $cart
                ->products()
                ->get();
            return $result;
        }
        //return $result[0]->product()->get();
        return false;
    }

    public function getCartProducts($cart_id)
    {
        $result = $this->startConditions()
            ->find($cart_id)
            ->cartProducts()
            ->get();

        return $result;
    }

    public function findCart($cart_id)
    {
        $result = $this->startConditions()
            ->find($cart_id);

        return $result;
    }

    public function getCart($cart_id)
    {
        $cart = $this->startConditions()
            ->find($cart_id);
        if (!$cart) {
            $result = $this->createNewCart();
            return $result->id;
        }

        return $cart->id;
    }

    public function getCartWithProducts($cart_id)
    {
        $cart = $this->startConditions()
            ->find($cart_id);
        if ($cart) {
            $result = $cart->cartProducts()
                ->get();
            return $result;
        }

        return false;
    }
}