<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('countries', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string("name");
            $table->string("official_name");
            $table->string("local_name");
            $table->string("code",8);
            $table->string("local_code",8);
            $table->string("abbreviation", 8)->nullable();
            $table->string("local_abbreviation", 8)->nullable();
            $table->string("calling_code", 4);
            $table->string("calling_prefix", 4);
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
        $this->schema()->drop('countries');
    }
}
