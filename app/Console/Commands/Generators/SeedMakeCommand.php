<?php

namespace App\Console\Commands\Generators;

use Illuminate\Database\Console\Seeds\SeederMakeCommand as IlluminateSeedMakeCommand;


class SeedMakeCommand extends IlluminateSeedMakeCommand
{
    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path("stubs/database/seeder/seeder.stub");
    }
}
