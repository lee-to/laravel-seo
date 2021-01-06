<?php

namespace Leeto\Seo\Providers;

use Illuminate\Support\ServiceProvider;
use Leeto\Seo\SeoManager;

class SeoServiceProvider extends ServiceProvider
{
    protected $namespace = "seo";

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('seo', SeoManager::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $path = __DIR__ . "/..";

        /* Config */
        $this->publishes([
            $path . '/config/' . $this->namespace . '.php' => config_path($this->namespace . '.php'),
        ]);

        /* Migrations */
        $this->loadMigrationsFrom($path . '/database/migrations');
    }

}
