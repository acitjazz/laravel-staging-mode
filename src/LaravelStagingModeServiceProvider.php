<?php

namespace Acitjazz\LaravelStagingMode;

use Acitjazz\LaravelStagingMode\Http\Middleware\DisabledRobotsMiddleware;
use Acitjazz\LaravelStagingMode\Http\Middleware\MyRobotsMiddleware;
use Acitjazz\LaravelStagingMode\Http\Middleware\StagingModeMiddleware;
use Illuminate\Support\ServiceProvider;

use Illuminate\Contracts\Http\Kernel;

class LaravelStagingModeServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(Kernel $kernel): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'acitjazz');
         $this->loadViewsFrom(__DIR__.'/../resources/views', 'acitjazz');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
         $this->loadRoutesFrom(__DIR__.'/routes.php');

         $kernel->pushMiddleware(StagingModeMiddleware::class);
         $kernel->pushMiddleware(DisabledRobotsMiddleware::class);
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravelstagingmode.php', 'laravelstagingmode');

        // Register the service the package provides.
        $this->app->singleton('laravelstagingmode', function ($app) {
            return new LaravelStagingMode;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravelstagingmode'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravelstagingmode.php' => config_path('laravelstagingmode.php'),
        ], 'acitjazz-laravelstagingmode.config');

        // Publishing the views.
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/acitjazz'),
        ], 'acitjazz-laravelstagingmode.views');

        // Publishing the Middleware.
        $this->publishes([
            __DIR__.'/../src/Http/Middleware' => base_path('app/Http/Middleware'),
        ], 'acitjazz-laravelstagingmode.middleware');

        
        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/acitjazz'),
        ], 'laravelstagingmode.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/acitjazz'),
        ], 'laravelstagingmode.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
