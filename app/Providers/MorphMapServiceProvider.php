<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class MorphMapServiceProvider extends ServiceProvider
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
        $map = [];

        $models = config('models');

        foreach ($models as $name => $config) {
            if (isset($config['morph'])) {
                $map[$config['morph']] = $config['namespace'];
            }
        }


        Relation::morphMap($map);
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
