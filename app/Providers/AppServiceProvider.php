<?php

namespace App\Providers;

use App\Category;

use App\Article;

use Carbon\Carbon;

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
        view()->composer("layouts.master", function ($view) {
            $categories = Category::has('articles')->pluck('name');
            $date = Carbon::now();
            $networks = ['facebook', 'twitter', 'google', 'youtube', 'feed'];
            $archives = Article::archives();
            $view->with(compact("categories", "date", "networks", "archives"));
        });

        view()->composer("layouts.articles", function ($view) {
            $categories = Category::has('articles')->get();
            $view->with(compact("categories"));
        });
    }
}
