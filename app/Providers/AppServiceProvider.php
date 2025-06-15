<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        // Force HTTPS in production (optional, tapi direkomendasikan)
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Set timezone (optional)
        date_default_timezone_set('Asia/Jakarta');
    }
}
