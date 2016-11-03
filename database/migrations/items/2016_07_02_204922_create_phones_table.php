<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('phones', function (Blueprint $table) {

            $table->smallIncrements('id');
            $table->smallInteger("user_id")->unsigned()->nullable();
            $table->string("number", 16);
            $table->string("extension", 8)->nullable()->default(null);
            $table->smallInteger("country_id")->unsigned()->nullable();
            $table->smallInteger("type_id")->unsigned()->nullable();
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
        Schema::drop('phones');
    }
}
