<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Panel\{
    Blog\Post\Post
};

use App\Observers\Panel\{
    Blog\Post\PostObserver
};

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
        Post::observe( PostObserver::class ); ## POST
    }

} // AppServiceProvider
