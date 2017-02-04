<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('protocol');
            $table->string('hostname');
            $table->string('directory')->nullable();
            $table->string('mime')->nullable();
            $table->string('resolution')->nullable();
            $table->string('filename')->nullable();
            $table->string('original_filename')->nullable();
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
        Schema::drop('images');
    }
}
