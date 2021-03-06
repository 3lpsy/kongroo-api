<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FractoServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('fracto', function ($app) {
            return new Fracto();
        });
    }
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
    }
}
