<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateCategoricalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('categoricals', function (Blueprint $table) {
            $table->increments('id');
            $table->fkInteger('category_id')->unsigned();
            $table->fkInteger('categorical_id');
            $table->string('categorical_type');
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
        Schema::drop('categoricals');
    }
}
