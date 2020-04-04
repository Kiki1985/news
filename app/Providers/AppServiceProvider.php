<?php

namespace App\Providers;

use App\Category;

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
        view()->composer("layouts.categories", function($view) 
        {
            $categories = Category::has('articles')->pluck('name');
            $view->with(compact("categories"));

        });
    }
}
