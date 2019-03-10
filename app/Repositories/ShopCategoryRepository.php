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

    public function getAllWithProducts()
    {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id',
        ];

        $result = $this->startConditions()
            ->orderBy('id', 'DESC')
            ->with(['products'])
            /*->with([
                'products' => function ($query) {
                    $query->get();
                }
            ])*/
            ->get();

        return $result;
    }

    public function getAll()
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
    }
}