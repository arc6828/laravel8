<?php

namespace App\Providers;

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
        // https://laracasts.com/discuss/channels/laravel/laravel-8-force-https-middleware-failed
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }        
    }
}
