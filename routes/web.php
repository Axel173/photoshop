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

    Route::get('search/', 'SearchController@search')
        ->name('shop.search');

    Route::get('category/{category_slug?}/', 'CategoryController@show')
        ->name('shop.category');

    Route::get('product/{product_slug}/', 'ProductController@show')
        ->name('shop.product');
    Route::get('cart/', 'CartController@index')
        ->name('shop.cart');
    Route::get('cart/add/{product_id}/', 'CartController@add')
        ->name('shop.cart.add');

    Route::delete('cart/delete/{id}', 'CartController@destroy')
        ->name('shop.cart.delete')
        ->where('id', '[0-9]+');

    $methods = ['index', 'edit', 'update', 'create', 'store',];

    Route::resource('order', 'OrderController')
        ->only($methods)
        ->names('shop.order');

});

$groupData = [
    'namespace' => 'Shop\Admin',
];
Route::group($groupData, function () {
    Route::get('admin/', 'AdminController@index')
        ->name('shop.admin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
