<?php
/**
 * Created by PhpStorm.
 * User: Kate
 * Date: 01.03.2019
 * Time: 13:17
 */

namespace App\Repositories;

use App\Models\ShopProduct as Model;

class ShopProductRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getProduct($product_slug)
    {
        return $this->startConditions()
            ->with(['category'])
            ->where('slug', $product_slug)
            ->first();
    }
    public function getProductsWithPaginate($per_page)
    {
        return $this->startConditions()
            ->paginate($per_page);
    }

    public function getSearchProductsWithPaginate($value, $per_page)
    {
        $result = $this->startConditions()::search($value)->paginate($per_page);
        return $result;
    }

    public function getAllWithCategories()
    {
        /*$columns = [
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
            //->with(['category', 'user'])
            ->with([
                'category' => function ($query) {
                    $query->select(['id', 'title']);
                }
            ])
            ->get();

        return $result;*/
    }
}