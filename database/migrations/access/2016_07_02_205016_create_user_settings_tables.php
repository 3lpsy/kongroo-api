<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateUserSettingsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('user_settings', function (Blueprint $table) {

            $table->smallIncrements('id');
            $table->tinyInteger('email_authentication')->nullable();
            $table->tinyInteger('phone_authentication')->nullable();
            $table->tinyInteger('two_factor_authentication')->nullable();
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
        Schema::drop('user_settings');
    }
}
