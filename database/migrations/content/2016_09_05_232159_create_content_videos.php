
<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateContentVideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('content_video', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string("provider")->default("local");
            $table->string("video_id");
            $table->string("video_src", 255)->nullable();
            $table->string("mime")->nullable();
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
        Schema::drop('content_video');
    }
}
