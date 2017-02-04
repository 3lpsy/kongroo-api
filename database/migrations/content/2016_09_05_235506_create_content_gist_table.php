<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateContentGistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('content_gist', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string("provider")->default('github');
            $table->string("gist_id")->nullable();
            $table->string("gist_src")->nullable();
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
        $this->schema()->dropIfExists('content_gist');
    }
}
