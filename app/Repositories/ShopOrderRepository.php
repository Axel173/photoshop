<?php
/**
 * Created by PhpStorm.
 * User: Kate
 * Date: 01.03.2019
 * Time: 13:17
 */

namespace App\Repositories;

use App\Models\ShopOrder as Model;

class ShopOrderRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function createNewOrder($fields)
    {
        $result = $this
            ->startConditions()::create(array(
                'total_price' => $fields['total_price'],
                'first_name' => $fields['first_name'],
                'last_name' => $fields['last_name'],
                'email' => $fields['email'],
                'description' => $fields['description'],
                'user_id' => $fields['user_id'],
                'is_published' => true,
            ));

        return $result;
    }

}