<?php

namespace JohnDoe\BlogPackage;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use JohnDoe\BlogPackage\Console\InstallBlogPackage;
use JohnDoe\BlogPackage\Http\Middleware\CapitalizeTitle;
use JohnDoe\BlogPackage\Providers\EventServiceProvider;

class BlogPackageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'blogpackage');

        //$this->app->register(EventServiceProvider::class);
    }

    public function boot()
    {

        $this->app->bind('calculator', function ($app) {
            return new Calculator();
        });

        $this->registerRoutes();

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'blogpackage');

        // Register a global middleware
        //$kernel = $this->app->make(Kernel::class);
        //$kernel->pushMiddleware(CapitalizeTitle::class);

        if ($this->app->runningInConsole()){
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('blogpackage.php'),
            ], 'config');

//        $this->commands([
//            InstallBlogPackage::class,
//        ]);

            $this->publishes([
                __DIR__ . '/../database/migrations/create_posts_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_posts_table.php'),
                // you can add any number of migrations here
            ], 'migrations');

            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/blogpackage'),
            ], 'views');

            $this->publishes([
                __DIR__.'/../resources/assets' => public_path('blogpackage'),
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
            'prefix' => config('blogpackage.prefix'),
            'middleware' => config('blogpackage.middleware'),
        ];
    }
}
