<?php

namespace App\Providers;

use App\Models\ShopProduct;
use App\Observers\ShopProductObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ShopProduct::observe(ShopProductObserver::class);
    }
}
