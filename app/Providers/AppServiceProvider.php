<?php

namespace App\Providers;

use App\Services\Contracts\PostServiceInterface;
use App\Services\PostService;
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
        $this->app
            ->singleton(PostServiceInterface::class, function () {
                return new PostService();
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
