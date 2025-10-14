<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// # Code for sing Bootstrap 5 for the paginator instead of TailwindCSS
use Illuminate\Pagination\Paginator;
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
        //
        // # Code for sing Bootstrap 5 for the paginator instead of TailwindCSS
        Paginator::useBootstrapFive();
    }
}
