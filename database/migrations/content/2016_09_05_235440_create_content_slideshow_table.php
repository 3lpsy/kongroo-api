<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateContentSlideshowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('content_slideshow', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string("provider")->default("local");
            $table->string("slideshow_id")->nullable();
            $table->string("slideshow_src")->nullable();;;
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
        $this->schema()->dropIfExists('content_slideshow');
    }
}
