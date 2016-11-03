<?php

namespace App\Services\Illuminate\Database\Migrations;

use Illuminate\Database\Migrations\Migrator as IlluminateMigrator;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;

class Migrator extends IlluminateMigrator
{

     /**
     * Rollback the last migration operation.
     *
     * @param  array|string $paths
     * @param  array  $options
     * @return array
     */
    public function rollback($paths = [], array $options = [])
    {
        $this->notes = [];

        $rolledBack = [];

        // We want to pull in the last batch of migrations that ran on the previous
        // migration operation. We'll then reverse those migrations and run each
        // of them "down" to reverse the last migration "operation" which ran.
        if (($steps = Arr::get($options, 'step', 0)) > 0) {
            $migrations = $this->repository->getMigrations($steps);
        } else {
            $migrations = $this->repository->getLast();
        }

        $count = count($migrations);

        $files = $this->getMigrationModuleFiles($paths);

        if ($count === 0) {
            $this->note('<info>Nothing to rollback.</info>');
        } else {
            // Next we will run through all of the migrations and call the "down" method
            // which will reverse each migration in order. This getLast method on the
            // repository already returns these migration's names in reverse order.
            $this->requireFiles($files);

            foreach ($migrations as $migration) {
                $migration = (object) $migration;

                $rolledBack[] = $files[$migration->migration];

                $this->runDown(
                    $files[$migration->migration],
                    $migration, Arr::get($options, 'pretend', false)
                );
            }
        }

        return $rolledBack;
    }

    /**
     * Run the outstanding migrations at a given path.
     *
     * @param  array|string  $paths
     * @param  array  $options
     * @return array
     */
    public function run($paths = [], array $options = [])
    {
        $this->notes = [];

        $files = $this->getMigrationModuleFilesFilteredByFk($paths);

        // Once we grab all of the migration files for the path, we will compare them
        // against the migrations that have already been run for this package then
        // run each of the outstanding migrations against a database connection.
        $ran = $this->repository->getRan();

        $migrations = Collection::make($files)
                        ->reject(function ($file) use ($ran) {
                            return in_array($this->getMigrationName($file), $ran);
                        })->values()->all();

        $this->requireFiles($migrations);

        $this->runMigrationList($migrations, $options);

        return $migrations;
    }



    public function getMigrationModuleFilesFilteredByFk($paths)
    {
        return Collection::make($paths)->flatMap(function ($path) {
            return $this->files->glob($path."{/**/*.php,/*.php}", GLOB_BRACE);
        })->filter()->sortBy(function ($file) {
            return $this->getMigrationName($file);
        })->sortBy(function ($file) {
            return str_contains($file, "fk");
        })->values()->keyBy(function ($file) {
            return $this->getMigrationName($file);
        })->all();
    }

    public function getMigrationModuleFiles($paths)
    {
        return Collection::make($paths)->flatMap(function ($path) {
            return $this->files->glob($path."{/**/*.php,/*.php}", GLOB_BRACE);
        })->filter()->sortBy(function ($file) {
            return $this->getMigrationName($file);
        })->values()->keyBy(function ($file) {
            return $this->getMigrationName($file);
        })->all();
    }

}
