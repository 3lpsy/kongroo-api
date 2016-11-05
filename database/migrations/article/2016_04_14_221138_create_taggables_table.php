<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateTaggablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('taggables', function (Blueprint $table) {
            $table->increments('id');
            $table->fkInteger('tag_id', 'small');
            $table->integer('taggable_id');
            $table->string('taggable_type');
            $table->stamps();
            $table->actions();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('taggables');
    }
}
