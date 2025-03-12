<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     */
    public function register(): void {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {

        View::composer('admin.*', function ($view) {
            $view->with('adminView', true);
        });

        if ($this->app->environment('production')) {
            $this->app['request']->server->set('HTTPS','on');
            URL::forceScheme('https');
        }
    }
}
