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
        $result = $this->startConditions()
            ->with(['category'])
            ->where('slug', $product_slug)
            ->first();
        return $result;
    }

    public function getRandomProducts($product_slug)
    {
        $result = $this->startConditions()
            ->where('slug', '!=', $product_slug)
            ->inRandomOrder()
            ->with(['category'])
            ->take(5)
            ->get();
        return $result;
    }

    public function getProductsWithPaginate($per_page)
    {
        $result = $this->startConditions()
            ->paginate($per_page);
        return $result;
    }

    public function getSearchProductsWithPaginate($value, $per_page)
    {
        $result = $this->startConditions()::search($value)->paginate($per_page);
        return $result;
    }

    public function countProducts()
    {
        $count = $this->startConditions()
            ->count();

        return $count;
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