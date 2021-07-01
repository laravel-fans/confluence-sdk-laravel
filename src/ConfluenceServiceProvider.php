<?php

namespace LaravelFans\Confluence;

use Illuminate\Support\ServiceProvider;

class ConfluenceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/confluence.php' => config_path('confluence.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->app->bind('confluence', function ($app) {
            return new Confluence();
        });
    }
}
