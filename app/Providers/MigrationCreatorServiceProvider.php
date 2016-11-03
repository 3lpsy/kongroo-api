<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Illuminate\Database\Migrations\Migrator;
use App\Services\Illuminate\Database\Migrations\MigrationCreator;

class MigrationCreatorServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {

        $this->app->singleton('migration.creator', function ($app) {
            return new MigrationCreator($app['files']);
        });
    }

    public function provides()
    {
        return ['migration.creator'];
    }
}
