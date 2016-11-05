<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('views', function (Blueprint $table) {
            $table->increments('id');
            $table->fkInteger('user_id', 'small');
            $table->fkInteger('article_id', 'small');
            $table->string('ip', 64)->nullable();
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
        Schema::drop('views');
    }
}
