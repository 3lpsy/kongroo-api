<?php
// app/Database/Migration.php

namespace App\Services\Illuminate\Database\Migrations;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration as BaseMigration;
use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;

class Migration extends BaseMigration
{

    public function schema($name = false)
    {
        if (!$name) {
            $name = env("DB_CONNECTION_APP");
        }
        $schema = DB::connection($name)->getSchemaBuilder();

        $schema->blueprintResolver(function ($table, $callback) {
            return new Blueprint($table, $callback);
        });

        return $schema;
    }

}