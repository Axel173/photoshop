<?php
/**
 * Created by PhpStorm.
 * User: Kate
 * Date: 01.03.2019
 * Time: 13:17
 */

namespace App\Repositories;

use App\Models\ShopOrderStatus as Model;

class ShopOrderStatusRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getForComboBox()
    {

        $result = $this
            ->startConditions()
            ->get();

        return $result;
    }
}