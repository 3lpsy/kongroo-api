<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('series', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->title();
            $table->subTitle();
            $table->description();
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
        Schema::drop('series');
    }
}
