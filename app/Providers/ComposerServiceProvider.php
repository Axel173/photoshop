<?php

namespace App\Providers;

use App\Repositories\ShopCategoryRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    protected $categories;

    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->categories = new ShopCategoryRepository();
        // Using Closure based composers...
        View::composer('layouts.shop.app', function ($view) {
            $view->with(['categories' => $this->categories->getAll()]);
        });
    }
}
