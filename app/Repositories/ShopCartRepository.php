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

    public function create()
    {
        /*$columns = [
            'id',
            'title',
            'parent_id',
            'slug'
        ];*/
        $result = $this
            ->startConditions()::create(array(
                'is_published' => true,
            ));
        /*$result = $this
            ->startConditions()
            ->select($columns)
            ->get();*/

        return $result;
    }

    public function getCartProduct($cart_id)
    {
        $result = $this->startConditions()
            ->find($cart_id)
            ->cartProducts()
            ->get();

        return $result;
    }

    public function getCart($cart_id)
    {
        $result = $this->startConditions()
            ->find($cart_id)
            ->first()
            ->cartProducts()
            ->get();
        return $result;
    }
}