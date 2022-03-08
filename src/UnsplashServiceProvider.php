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
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/unsplash.php' => config_path('unsplash.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../database/migrations/create_unsplashables_table.php.stub' => database_path('migrations').'/'.date('Y_m_d_His').'_create_unsplashables_table.php',
            ], 'migrations');
            $this->publishes([
                __DIR__.'/../database/migrations/create_unsplash_assets_table.php.stub' => database_path('migrations').'/'.date('Y_m_d_His').'_create_unsplash_assets_table.php',
            ], 'migrations');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/unsplash.php', 'unsplash');

        // Bind main class to service container
        $this->app->bind(Unsplash::class, function () {
            return new Unsplash();
        });
    }
}
