<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$groupData = [
    'namespace' => 'Shop',
];

Route::group($groupData, function () {
    Route::get('/', 'HomeController@index');

    Route::get('category/{category_slug}/', 'CategoryController@show')->name('shop.category');

    Route::get('category/{category_slug}/product/{product_slug}/','ProductController@show')->name('shop.product');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
