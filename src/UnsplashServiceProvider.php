<?php

namespace MarkSitko\LaravelUnsplash;

use Illuminate\Support\ServiceProvider;

class UnsplashServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/unsplash.php' => config_path('unsplash.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/unsplash.php', 'unsplash');

        // Register the main class to use with the facade
        $this->app->singleton('unsplash', function () {
            return new Unsplash();
        });

        // Bind main class to service container
        $this->app->bind(Unsplash::class, function () {
            return new Unsplash();
        });
    }
}
