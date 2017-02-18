<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
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
}
