<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreatePermissionTypesTable extends Migration
{

    public $table = 'permission_types';

    public function up()
    {
        $this->schema()->create($this->table, function (Blueprint $table) {

            $table->smallIncrements('id');

            $table->nomen();

            $table->stamps();

            $table->actions();

        });
    }

    public function down()
    {

         $this->schema()->dropIfExists($this->table);

    }
}
