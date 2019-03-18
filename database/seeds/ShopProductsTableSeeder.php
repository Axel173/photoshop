<?php

use Illuminate\Database\Seeder;
use App\Models\ShopProduct;

class ShopProductsTableSeeder extends Seeder
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
        //животные
        ShopProduct::create(
            [
                'category_id' => 1,
                'slug' => Str::slug($categories_arr[0]),
                'title' => $categories_arr[0],
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[0]) . '/' . Str::slug($categories_arr[0]) . '.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[0]) . '/' . Str::slug($categories_arr[0]) . '.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[0]) . '/' . Str::slug($categories_arr[0]) . '.jpg',
                'description' => Str::slug($categories_arr[0]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 1,
                'slug' => Str::slug($categories_arr[0] . '1'),
                'title' => $categories_arr[0] . '1',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[0]) . '/' . Str::slug($categories_arr[0]) . '1.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[0]) . '/' . Str::slug($categories_arr[0]) . '1.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[0]) . '/' . Str::slug($categories_arr[0]) . '1.jpg',
                'description' => Str::slug($categories_arr[0]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 1,
                'slug' => Str::slug($categories_arr[0] . '2'),
                'title' => $categories_arr[0] . '2',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[0]) . '/' . Str::slug($categories_arr[0]) . '2.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[0]) . '/' . Str::slug($categories_arr[0]) . '2.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[0]) . '/' . Str::slug($categories_arr[0]) . '2.jpg',
                'description' => Str::slug($categories_arr[0]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        //Архитектура
        ShopProduct::create(
            [
                'category_id' => 2,
                'slug' => Str::slug($categories_arr[1]),
                'title' => $categories_arr[1],
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[1]) . '/' . Str::slug($categories_arr[1]) . '.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[1]) . '/' . Str::slug($categories_arr[1]) . '.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[1]) . '/' . Str::slug($categories_arr[1]) . '.jpg',
                'description' => Str::slug($categories_arr[1]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 2,
                'slug' => Str::slug($categories_arr[1] . '1'),
                'title' => $categories_arr[1] . '1',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[1]) . '/' . Str::slug($categories_arr[1]) . '1.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[1]) . '/' . Str::slug($categories_arr[1]) . '1.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[1]) . '/' . Str::slug($categories_arr[1]) . '1.jpg',
                'description' => Str::slug($categories_arr[1]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        //Города
        ShopProduct::create(
            [
                'category_id' => 3,
                'slug' => Str::slug($categories_arr[2]),
                'title' => $categories_arr[2],
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[2]) . '/' . Str::slug($categories_arr[2]) . '.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[2]) . '/' . Str::slug($categories_arr[2]) . '.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[2]) . '/' . Str::slug($categories_arr[2]) . '.jpg',
                'description' => Str::slug($categories_arr[2]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 3,
                'slug' => Str::slug($categories_arr[2] . '1'),
                'title' => $categories_arr[2] . '1',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[2]) . '/' . Str::slug($categories_arr[2]) . '1.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[2]) . '/' . Str::slug($categories_arr[2]) . '1.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[2]) . '/' . Str::slug($categories_arr[2]) . '1.jpg',
                'description' => Str::slug($categories_arr[2]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 3,
                'slug' => Str::slug($categories_arr[2] . '2'),
                'title' => $categories_arr[2] . '2',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[2]) . '/' . Str::slug($categories_arr[2]) . '2.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[2]) . '/' . Str::slug($categories_arr[2]) . '2.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[2]) . '/' . Str::slug($categories_arr[2]) . '2.jpg',
                'description' => Str::slug($categories_arr[2]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        //Электроника
        ShopProduct::create(
            [
                'category_id' => 4,
                'slug' => Str::slug($categories_arr[3]),
                'title' => $categories_arr[3],
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[3]) . '/' . Str::slug($categories_arr[3]) . '.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[3]) . '/' . Str::slug($categories_arr[3]) . '.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[3]) . '/' . Str::slug($categories_arr[3]) . '.jpg',
                'description' => Str::slug($categories_arr[3]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 4,
                'slug' => Str::slug($categories_arr[3] . '1'),
                'title' => $categories_arr[3] . '1',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[3]) . '/' . Str::slug($categories_arr[3]) . '1.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[3]) . '/' . Str::slug($categories_arr[3]) . '1.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[3]) . '/' . Str::slug($categories_arr[3]) . '1.jpg',
                'description' => Str::slug($categories_arr[3]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 4,
                'slug' => Str::slug($categories_arr[3] . '2'),
                'title' => $categories_arr[3] . '2',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[3]) . '/' . Str::slug($categories_arr[3]) . '2.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[3]) . '/' . Str::slug($categories_arr[3]) . '2.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[3]) . '/' . Str::slug($categories_arr[3]) . '2.jpg',
                'description' => Str::slug($categories_arr[3]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        //Декорации
        ShopProduct::create(
            [
                'category_id' => 5,
                'slug' => Str::slug($categories_arr[4]),
                'title' => $categories_arr[4],
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[4]) . '/' . Str::slug($categories_arr[4]) . '.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[4]) . '/' . Str::slug($categories_arr[4]) . '.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[4]) . '/' . Str::slug($categories_arr[4]) . '.jpg',
                'description' => Str::slug($categories_arr[4]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 5,
                'slug' => Str::slug($categories_arr[4] . '1'),
                'title' => $categories_arr[4] . '1',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[4]) . '/' . Str::slug($categories_arr[4]) . '1.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[4]) . '/' . Str::slug($categories_arr[4]) . '1.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[4]) . '/' . Str::slug($categories_arr[4]) . '1.jpg',
                'description' => Str::slug($categories_arr[4]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 5,
                'slug' => Str::slug($categories_arr[4] . '2'),
                'title' => $categories_arr[4] . '2',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[4]) . '/' . Str::slug($categories_arr[4]) . '2.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[4]) . '/' . Str::slug($categories_arr[4]) . '2.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[4]) . '/' . Str::slug($categories_arr[4]) . '2.jpg',
                'description' => Str::slug($categories_arr[4]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        //Еда и Напитки
        ShopProduct::create(
            [
                'category_id' => 6,
                'slug' => Str::slug($categories_arr[5]),
                'title' => $categories_arr[5],
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[5]) . '/' . Str::slug($categories_arr[5]) . '.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[5]) . '/' . Str::slug($categories_arr[5]) . '.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[5]) . '/' . Str::slug($categories_arr[5]) . '.jpg',
                'description' => Str::slug($categories_arr[5]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 6,
                'slug' => Str::slug($categories_arr[5] . '1'),
                'title' => $categories_arr[5] . '1',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[5]) . '/' . Str::slug($categories_arr[5]) . '1.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[5]) . '/' . Str::slug($categories_arr[5]) . '1.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[5]) . '/' . Str::slug($categories_arr[5]) . '1.jpg',
                'description' => Str::slug($categories_arr[5]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 6,
                'slug' => Str::slug($categories_arr[5] . '2'),
                'title' => $categories_arr[5] . '2',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[5]) . '/' . Str::slug($categories_arr[5]) . '2.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[5]) . '/' . Str::slug($categories_arr[5]) . '2.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[5]) . '/' . Str::slug($categories_arr[5]) . '2.jpg',
                'description' => Str::slug($categories_arr[5]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 6,
                'slug' => Str::slug($categories_arr[5] . '3'),
                'title' => $categories_arr[5] . '3',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[5]) . '/' . Str::slug($categories_arr[5]) . '3.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[5]) . '/' . Str::slug($categories_arr[5]) . '3.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[5]) . '/' . Str::slug($categories_arr[5]) . '3.jpg',
                'description' => Str::slug($categories_arr[5]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        //Природа
        ShopProduct::create(
            [
                'category_id' => 7,
                'slug' => Str::slug($categories_arr[6]),
                'title' => $categories_arr[6],
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[6]) . '/' . Str::slug($categories_arr[6]) . '.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[6]) . '/' . Str::slug($categories_arr[6]) . '.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[6]) . '/' . Str::slug($categories_arr[6]) . '.jpg',
                'description' => Str::slug($categories_arr[6]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 7,
                'slug' => Str::slug($categories_arr[6] . '1'),
                'title' => $categories_arr[6] . '1',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[6]) . '/' . Str::slug($categories_arr[6]) . '1.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[6]) . '/' . Str::slug($categories_arr[6]) . '1.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[6]) . '/' . Str::slug($categories_arr[6]) . '1.jpg',
                'description' => Str::slug($categories_arr[6]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 7,
                'slug' => Str::slug($categories_arr[6] . '2'),
                'title' => $categories_arr[6] . '2',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[6]) . '/' . Str::slug($categories_arr[6]) . '2.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[6]) . '/' . Str::slug($categories_arr[6]) . '2.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[6]) . '/' . Str::slug($categories_arr[6]) . '2.jpg',
                'description' => Str::slug($categories_arr[6]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        //Люди
        ShopProduct::create(
            [
                'category_id' => 8,
                'slug' => Str::slug($categories_arr[7]),
                'title' => $categories_arr[7],
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[7]) . '/' . Str::slug($categories_arr[7]) . '.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[7]) . '/' . Str::slug($categories_arr[7]) . '.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[7]) . '/' . Str::slug($categories_arr[7]) . '.jpg',
                'description' => Str::slug($categories_arr[7]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 8,
                'slug' => Str::slug($categories_arr[7] . '1'),
                'title' => $categories_arr[7] . '1',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[7]) . '/' . Str::slug($categories_arr[7]) . '1.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[7]) . '/' . Str::slug($categories_arr[7]) . '1.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[7]) . '/' . Str::slug($categories_arr[7]) . '1.jpg',
                'description' => Str::slug($categories_arr[7]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 8,
                'slug' => Str::slug($categories_arr[7] . '2'),
                'title' => $categories_arr[7] . '2',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[7]) . '/' . Str::slug($categories_arr[7]) . '2.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[7]) . '/' . Str::slug($categories_arr[7]) . '2.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[7]) . '/' . Str::slug($categories_arr[7]) . '2.jpg',
                'description' => Str::slug($categories_arr[7]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 8,
                'slug' => Str::slug($categories_arr[7] . '3'),
                'title' => $categories_arr[7] . '3',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[7]) . '/' . Str::slug($categories_arr[7]) . '3.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[7]) . '/' . Str::slug($categories_arr[7]) . '3.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[7]) . '/' . Str::slug($categories_arr[7]) . '3.jpg',
                'description' => Str::slug($categories_arr[7]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        //Спорт
        ShopProduct::create(
            [
                'category_id' => 9,
                'slug' => Str::slug($categories_arr[8]),
                'title' => $categories_arr[8],
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '.jpg',
                'description' => Str::slug($categories_arr[8]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 9,
                'slug' => Str::slug($categories_arr[8] . '1'),
                'title' => $categories_arr[8] . '1',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '1.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '1.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '1.jpg',
                'description' => Str::slug($categories_arr[8]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 9,
                'slug' => Str::slug($categories_arr[8] . '2'),
                'title' => $categories_arr[8] . '2',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '2.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '2.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '2.jpg',
                'description' => Str::slug($categories_arr[8]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 9,
                'slug' => Str::slug($categories_arr[8] . '3'),
                'title' => $categories_arr[8] . '3',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '3.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '3.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '3.jpg',
                'description' => Str::slug($categories_arr[8]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 9,
                'slug' => Str::slug($categories_arr[8] . '4'),
                'title' => $categories_arr[8] . '4',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '4.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '4.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '4.jpg',
                'description' => Str::slug($categories_arr[8]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 9,
                'slug' => Str::slug($categories_arr[8] . '5'),
                'title' => $categories_arr[8] . '5',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '5.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '5.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '5.jpg',
                'description' => Str::slug($categories_arr[8]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 9,
                'slug' => Str::slug($categories_arr[8] . '6'),
                'title' => $categories_arr[8] . '6',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '6.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '6.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[8]) . '/' . Str::slug($categories_arr[8]) . '6.jpg',
                'description' => Str::slug($categories_arr[8]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        //Транспорт
        ShopProduct::create(
            [
                'category_id' => 10,
                'slug' => Str::slug($categories_arr[9]),
                'title' => $categories_arr[9],
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[9]) . '/' . Str::slug($categories_arr[9]) . '.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[9]) . '/' . Str::slug($categories_arr[9]) . '.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[9]) . '/' . Str::slug($categories_arr[9]) . '.jpg',
                'description' => Str::slug($categories_arr[9]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 10,
                'slug' => Str::slug($categories_arr[9] . '1'),
                'title' => $categories_arr[9] . '1',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[9]) . '/' . Str::slug($categories_arr[9]) . '1.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[9]) . '/' . Str::slug($categories_arr[9]) . '1.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[9]) . '/' . Str::slug($categories_arr[9]) . '1.jpg',
                'description' => Str::slug($categories_arr[9]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 10,
                'slug' => Str::slug($categories_arr[9] . '2'),
                'title' => $categories_arr[9] . '2',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[9]) . '/' . Str::slug($categories_arr[9]) . '2.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[9]) . '/' . Str::slug($categories_arr[9]) . '2.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[9]) . '/' . Str::slug($categories_arr[9]) . '2.jpg',
                'description' => Str::slug($categories_arr[9]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 10,
                'slug' => Str::slug($categories_arr[9] . '3'),
                'title' => $categories_arr[9] . '3',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[9]) . '/' . Str::slug($categories_arr[9]) . '3.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[9]) . '/' . Str::slug($categories_arr[9]) . '3.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[9]) . '/' . Str::slug($categories_arr[9]) . '3.jpg',
                'description' => Str::slug($categories_arr[9]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 10,
                'slug' => Str::slug($categories_arr[9] . '4'),
                'title' => $categories_arr[9] . '4',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[9]) . '/' . Str::slug($categories_arr[9]) . '4.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[9]) . '/' . Str::slug($categories_arr[9]) . '4.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[9]) . '/' . Str::slug($categories_arr[9]) . '4.jpg',
                'description' => Str::slug($categories_arr[9]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 10,
                'slug' => Str::slug($categories_arr[9] . '5'),
                'title' => $categories_arr[9] . '5',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[9]) . '/' . Str::slug($categories_arr[9]) . '5.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[9]) . '/' . Str::slug($categories_arr[9]) . '5.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[9]) . '/' . Str::slug($categories_arr[9]) . '5.jpg',
                'description' => Str::slug($categories_arr[9]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        //Места
        ShopProduct::create(
            [
                'category_id' => 11,
                'slug' => Str::slug($categories_arr[10]),
                'title' => $categories_arr[10],
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[10]) . '/' . Str::slug($categories_arr[10]) . '.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[10]) . '/' . Str::slug($categories_arr[10]) . '.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[10]) . '/' . Str::slug($categories_arr[10]) . '.jpg',
                'description' => Str::slug($categories_arr[10]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 11,
                'slug' => Str::slug($categories_arr[10] . '1'),
                'title' => $categories_arr[10] . '1',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[10]) . '/' . Str::slug($categories_arr[10]) . '1.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[10]) . '/' . Str::slug($categories_arr[10]) . '1.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[10]) . '/' . Str::slug($categories_arr[10]) . '1.jpg',
                'description' => Str::slug($categories_arr[10]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        ShopProduct::create(
            [
                'category_id' => 11,
                'slug' => Str::slug($categories_arr[10] . '2'),
                'title' => $categories_arr[10] . '2',
                'price' => rand(100, 900),
                'discount' => rand(0, 95),
                'thumb_img' => 'images/products/' . Str::slug($categories_arr[10]) . '/' . Str::slug($categories_arr[10]) . '2.jpg',
                'preview_img' => 'images/products/' . Str::slug($categories_arr[10]) . '/' . Str::slug($categories_arr[10]) . '2.jpg',
                'original_img' => 'images/products/' . Str::slug($categories_arr[10]) . '/' . Str::slug($categories_arr[10]) . '2.jpg',
                'description' => Str::slug($categories_arr[10]) . 'description',
                'is_published' => 1,
                'published_at' => $date = date("Y-m-d h:m:s", rand(1507807320, 1518007320)), //'2019-01-17 05:11:03',
            ]
        );
        /*ShopProduct::create(

        );
        ShopProduct::create(

        );
        ShopProduct::create(

        );*/

        //DB::table('shop_products')->insert($data);
    }
}
