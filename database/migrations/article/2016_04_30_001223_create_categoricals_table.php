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
            $table->integer('category_id')->unsigned();
            $table->integer('categorical_id');
            $table->string('categorical_type');
            $table->status();
            $table->trackableTimestamps();
            $table->restorableSoftDeletes();
            $table->primary(['category_id', 'categorical_id', 'categorical_type']);
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
