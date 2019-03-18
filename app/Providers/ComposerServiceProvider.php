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
    protected $arrResult;

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
        if (app()->runningInConsole() === false) {
            $this->categories = new ShopCategoryRepository();
            $this->arrResult = $this->categories->getAll();
            // Using Closure based composers...
            View::composer('*', function ($view) {
                $view->with(['categories' => $this->arrResult]);
            });
        }

    }
}
