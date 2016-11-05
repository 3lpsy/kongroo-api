<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Console\Commands\Migrations\MigrateCommand;
use App\Services\Illuminate\Database\Migrations\Migrator;

use App\Services\Illuminate\Database\Migrations\MigrationCreator;
use App\Services\Illuminate\Database\Migrations\DatabaseMigrationRepository;
use Illuminate\Database\MigrationServiceProvider as IlluminateMigrationServiceProvider;

class MigrationServiceProvider extends IlluminateMigrationServiceProvider
{

    protected $defer = true;


    /**
     * Register the migration creator.
     *
     * @return void
     */
    protected function registerCreator()
    {
        $this->app->singleton('migration.creator', function ($app) {
            return new MigrationCreator($app['files']);
        });
    }

    /**
     * Register the migration repository service.
     *
     * @return void
     */
    protected function registerRepository()
    {
        $this->app->singleton('migration.repository', function ($app) {
            $table = $app['config']['database.migrations'];

            return new DatabaseMigrationRepository($app['db'], $table);
        });
    }
    /**
     * Register the migrator service.
     *
     * @return void
     */
    protected function registerMigrator()
    {

        $this->app->singleton('migrator', function ($app) {
            $repository = $app['migration.repository'];

            return new Migrator($repository, $app['db'], $app['files']);
        });
    }

    /**
     * Register the "migrate" migration command.
     *
     * @return void
     */
    protected function registerMigrateCommand()
    {
        $this->app->singleton('command.migrate', function ($app) {
            return new MigrateCommand($app['migrator']);
        });
    }

}
