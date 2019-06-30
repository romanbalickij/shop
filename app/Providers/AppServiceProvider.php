<?php

namespace App\Providers;

use App\Model\Brand;
use App\Model\Category;
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
        view()->composer('commerce.partial.menu', function ($view) {
            $view->with('categories', Category::getCategory());
        });
        view()->composer('commerce.partial.sidebar', function ($view) {
            $view->with('categories', Category::getCategory());
        });
        view()->composer('commerce.partial.sidebar', function ($view) {
            $view->with('brands', Brand::getBrand());
        });


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
