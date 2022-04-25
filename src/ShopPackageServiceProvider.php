<?php

namespace Yaromir\ShopPackage;

use Illuminate\Database\Eloquent\Factories\Factory;
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

        $this->app->bind('exchanger', function ($app) {
            return new Exchanger();
        });
        $this->app->bind('delivery', function ($app) {
            return new Delivery();
        });

        $this->registerRoutes();

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'shoppackage');

        if ($this->app->runningInConsole()){
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('shoppackage.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../database/seeders/CategorySeeder.php' => database_path('seeders/CategorySeeder.php'),
                __DIR__ . '/../database/seeders/ClientSeeder.php' => database_path('seeders/ClientSeeder.php'),
                __DIR__ . '/../database/seeders/ProviderSeeder.php' => database_path('seeders/ProviderSeeder.php'),
                __DIR__ . '/../database/seeders/StorageSeeder.php' => database_path('seeders/StorageSeeder.php'),
                __DIR__ . '/../database/seeders/OrderSeeder.php' => database_path('seeders/OrderSeeder.php'),
                __DIR__ . '/../database/seeders/ProductSeeder.php' => database_path('seeders/ProductSeeder.php'),
            ], 'seeders');

            $this->publishes([
                __DIR__ . '/../database/migrations/create_categories_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_categories_table.php'),
                __DIR__ . '/../database/migrations/create_clients_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_clients_table.php'),
                __DIR__ . '/../database/migrations/create_orders_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_orders_table.php'),
                __DIR__ . '/../database/migrations/create_products_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_products_table.php'),
                __DIR__ . '/../database/migrations/create_providers_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_providers_table.php'),
                __DIR__ . '/../database/migrations/create_storages_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_storages_table.php'),
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
