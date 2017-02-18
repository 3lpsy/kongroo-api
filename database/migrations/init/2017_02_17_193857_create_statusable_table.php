<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateStatusableTable extends Migration
{
    public $table = 'statusable';

    public function up()
    {
        $this->schema()->create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status_id');
            $table->integer('statusable_id');
            $table->string('statusable_type');
            $table->stamps();
            $table->actions();
        });
    }

    public function down()
    {
        $this->schema()->dropIfExists($this->table);
    }
}
