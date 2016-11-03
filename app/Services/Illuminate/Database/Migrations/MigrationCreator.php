<?php

namespace App\Services\Illuminate\Database\Migrations;

use Illuminate\Database\Migrations\MigrationCreator as IlluminateMigrationCreator;

class MigrationCreator extends IlluminateMigrationCreator
{
    public function getStubPath()
    {
        return base_path("stubs/illuminate/database/migrations");
    }

    protected function getStub($table, $create)
    {
        if (is_null($table)) {
            return $this->files->get($this->getStubPath().'/blank.stub');
        }

        // We also have stubs for creating new tables and modifying existing tables
        // to save the developer some typing when they are creating a new tables
        // or modifying existing tables. We'll grab the appropriate stub here.
        else {
            $stub = $create ? 'create.stub' : 'update.stub';

            return $this->files->get($this->getStubPath()."/{$stub}");
        }
    }
}