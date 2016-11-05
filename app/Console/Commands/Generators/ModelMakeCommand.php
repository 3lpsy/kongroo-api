<?php

namespace App\Console\Commands\Generators;

use Illuminate\Foundation\Console\ModelMakeCommand as IlluminateMakeModelCommand;


class ModelMakeCommand extends IlluminateMakeModelCommand
{

    protected $signature = 'make:model {name : The name of the migration.}
        {--create= : The table to be created.}
        {--table= : The table to migrate.}
        {--path= : The location where the migration file should be created.}';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path("stubs/illuminate/model/base.stub");
    }
}
