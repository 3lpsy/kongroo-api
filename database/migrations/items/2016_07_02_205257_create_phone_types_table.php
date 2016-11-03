<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreatePhoneTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('phone_types', function (Blueprint $table) {

            $table->smallIncrements('id');
            $table->string('name', 32);
            $table->string('display_name', 32);
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
        Schema::drop('phone_types');
    }
}
