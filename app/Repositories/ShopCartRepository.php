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

    /*public function getAll()
    {
        $columns = [
            'id',
            'title',
            'parent_id',
            'slug'
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->get();

        return $result;
    }*/
}