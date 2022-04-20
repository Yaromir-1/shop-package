<?php

namespace Yaromir\ShopPackage;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ShopPackageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'shoppackage');

    }

    public function boot()
    {

        $this->app->bind('calculator', function ($app) {
            return new Calculator();
        });

        $this->registerRoutes();

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'shoppackage');

        if ($this->app->runningInConsole()){
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('shoppackage.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../database/migrations/create_posts_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_posts_table.php'),
                // you can add any number of migrations here
            ], 'migrations');

            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/shoppackage'),
            ], 'views');

            $this->publishes([
                __DIR__.'/../resources/assets' => public_path('shoppackage'),
            ], 'assets');
        }

    }

    public function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'../../routes/web.php');
        });
    }

    public function routeConfiguration()
    {
        return [
            'prefix' => config('shoppackage.prefix'),
            'middleware' => config('shoppackage.middleware'),
        ];
    }
}
