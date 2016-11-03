<?php


use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;


class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('videos', function (Blueprint $table) {
            $table->smallInteger('id');
            $table->string('filename');
            $table->string('mime');
            $table->string('original_filename');
            $table->string('location');
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
        $this->schema()->dropIfExists('videos');
    }
}
