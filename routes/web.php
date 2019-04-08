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
    Route::get('/', 'HomeController@index')
        ->name('shop.main');

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
    Route::get('personal/', 'PersonalController@index')
        ->name('shop.personal')
        ->middleware(['auth']);

    Route::delete('cart/delete/{id}', 'CartController@destroy')
        ->name('shop.cart.delete')
        ->where('id', '[0-9]+');

    $methods = ['index', 'edit', 'update', 'create', 'store',];

    Route::resource('order', 'OrderController')
        ->only($methods)
        ->names('shop.order');

    Route::post('ulogin', 'UloginController@login')
        ->name('shop.ulogin');

});



$groupData = [
    'namespace' => 'Shop\Admin',
];
Route::group($groupData, function () {
    //отображение формы аутентификации админа
    Route::get('admin/login', 'LoginController@showLoginForm')->name('shop.admin.login');
    Route::post('admin/login', 'LoginController@login');

    Route::get('admin/', 'AdminController@index')
        ->name('shop.admin');
});

Auth::routes();
//POST запрос аутентификации на сайте
/*Route::post('admin/login', 'Auth\LoginController@loginn');*/



Route::get('/home', 'HomeController@index')->name('home');
