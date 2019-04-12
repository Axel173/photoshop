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

    public function getCategoryWithProductsPaginate($category_slug, $per_page)
    {
        $result = $this->startConditions()
            ->orderBy('id', 'DESC')
            ->where('slug', $category_slug)
            ->first()
            ->products()
            ->paginate($per_page);


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

    public function countCategories()
    {
        $count = $this->startConditions()
            ->count();

        return $count;
    }

    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->with([
                'parentCategory:id,title'
            ])
            ->paginate($perPage);

        return $result;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getForComboBox()
    {
        $columns = implode( ', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title',
        ]);

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

    public function delete($id)
    {
        return $this->startConditions()
            ->find($id)
            ->delete();
    }
}