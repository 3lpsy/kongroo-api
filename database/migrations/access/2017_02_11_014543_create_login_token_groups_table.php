<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateLoginTokenGroupsTable extends Migration
{
    public $table = 'token_groups';

    public function up()
    {
        $this->schema()->create($this->table, function (Blueprint $table) {
            $table->increments('id');

            $table->stamps();

            $table->actions();
        });
    }

    public function down()
    {
        $this->schema()->dropIfExists($this->table);
    }
}
