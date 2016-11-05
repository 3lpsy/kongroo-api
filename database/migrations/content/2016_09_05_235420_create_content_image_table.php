<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateContentImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('content_image', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string("provider")->default("local");
            $table->string("image_id")->nullable();
            $table->string("image_src")->nullable();
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
        $this->schema()->dropIfExists('content_image');
    }
}
