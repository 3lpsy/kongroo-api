<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateContentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('section_types', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string("name");
            $table->string("display_name");
            $table->string('description')->nullable();
            $table->slug();
            $table->status();
            $table->trackableTimestamps();
            $table->restorableSoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('section_types');
    }
}
