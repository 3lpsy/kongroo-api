<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateLoginTokenTypesTable extends Migration
{
    public $table = 'token_types';

    public function up()
    {
        $this->schema()->create($this->table, function (Blueprint $table) {
            $table->increments('id');

            $table->nomen();

            $table->smallInteger('required')->default(0);

            $table->stamps();

            $table->actions();
        });
    }

    public function down()
    {
        $this->schema()->dropIfExists($this->table);
    }
}
