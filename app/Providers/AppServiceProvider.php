<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\View\View;
use App\Http\Controllers\CartController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       Paginator::useBootstrap();
       view()->composer('frontend.layouts.layout', CategoryComposer::class);
    //    View::share('cartCount', app(CartController::class)->cartCount());
    }
}
