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
            $table->nomen();
            $table->slug();
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
        Schema::drop('phone_types');
    }
}
