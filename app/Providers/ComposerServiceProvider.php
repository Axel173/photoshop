<?php

namespace App\Providers;

use App\Repositories\ShopCartRepository;
use App\Repositories\ShopCategoryRepository;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    protected $categories;
    protected $arrCategories;
    protected $cart;
    protected $cart_id;
    protected $arrResult;
    protected $arrCart;

    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        if (app()->runningInConsole() === false) {
            $this->categories = new ShopCategoryRepository();
            $this->categories->getAll();

            // Using Closure based composers...
            $this->cart = new ShopCartRepository();
            $this->cart_id = Cookie::get('cart');

            if($this->cart_id)
            {
                // get the encrypter service
                $encrypter = app(\Illuminate\Contracts\Encryption\Encrypter::class);

                // decrypt
                $this->cart_id = $encrypter->decrypt($this->cart_id, false);
            }
            $this->arrCategories = $this->categories->getAll();
            $this->arrCart = $this->cart_id ? $this->cart->getCart($this->cart_id) : false;
            View::composer('*', function ($view) {
                $view->with([
                    'categories' => $this->arrCategories,
                    'cart' => $this->arrCart
                ]);
            });
        }

    }
}
