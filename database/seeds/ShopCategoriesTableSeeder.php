<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        $categories_arr = [
            'Животные',
            'Архитектура',
            'Города',
            'Электроника',
            'Декорации',
            'Еда и Напитки',
            'Природа',
            'Люди',
            'Спорт',
            'Транспорт',
            'Места',
        ];

        $categories_count = count($categories_arr);

        for ($i = 0; $i < $categories_count; $i++) {
            $category_name = $categories_arr[$i];
            $categories[] = [
                'title' => $category_name,
                'slug' => Str::slug($category_name),
                'parent_id' => 0,
            ];
        }

        DB::table('shop_categories')->insert($categories);
    }
}
