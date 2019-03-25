<?php
/**
 * Created by PhpStorm.
 * User: Kate
 * Date: 01.03.2019
 * Time: 13:17
 */

namespace App\Repositories;

use App\User as Model;

class ShopUserRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function findEmail($email)
    {
        $result = $this
            ->startConditions()
            ->where(['email' => $email])
            ->first();

        return $result;
    }

}