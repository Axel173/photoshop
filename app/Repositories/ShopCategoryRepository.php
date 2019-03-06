<?php
/**
 * Created by PhpStorm.
 * User: Kate
 * Date: 01.03.2019
 * Time: 13:17
 */

namespace App\Repositories;

use App\Models\ShopCategory as Model;

class ShopCategoryRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }
}