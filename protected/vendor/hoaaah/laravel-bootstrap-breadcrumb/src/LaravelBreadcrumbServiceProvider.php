<?php

namespace hoaaah\LaravelBreadcrumb;

use Illuminate\Support\ServiceProvider;

class LaravelBreadcrumbServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->loadViewsFrom(__DIR__.'/views', 'breadcrumb');
        // $this->publishes([
        //     __DIR__.'/views' => base_path('resources/views/laraveldaily/timezones'),
        // ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        include __DIR__.'/routes.php';
        $this->app->make('hoaaah\Breadcrumb\BreadcrumbController');
    }

    public function provides()
    {
        return ['laravelbreadcrumb'];
    }    
}
