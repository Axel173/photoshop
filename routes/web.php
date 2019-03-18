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

    Route::get('search/', 'SearchController@search')->name('shop.search');

    Route::get('category/{category_slug?}/', 'CategoryController@show')->name('shop.category');

    Route::get('product/{product_slug}/','ProductController@show')->name('shop.product');
    Route::get('cart/','CartController@index')->name('shop.cart');
    Route::get('cart/add/{product_id}/','CartController@add')->name('shop.cart.add');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
