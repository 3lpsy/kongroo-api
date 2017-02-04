<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateVideoSourcesTable extends Migration
{
    public $table = 'video_sources';

    public function up()
    {
        $this->schema()->create($this->table, function (Blueprint $table) {
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

    public function down()
    {
        $this->schema()->dropIfExists($this->table);
    }
}
