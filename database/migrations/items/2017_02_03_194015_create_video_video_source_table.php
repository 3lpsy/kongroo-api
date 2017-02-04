<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateVideoVideoSourceTable extends Migration
{
    public $table = 'video_video_source';

    public function up()
    {
        $this->schema()->create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->fkInteger("video_id");
            $table->fkInteger("video_source_id");
            $table->stamps();

            $table->actions();
        });
    }

    public function down()
    {
        $this->schema()->dropIfExists($this->table);
    }
}
