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
            $table->smallInteger('user_id')->unsigned();
            $table->smallInteger('article_id')->unsigned();
            $table->string('ip', 64)->nullable();
            $table->status();
            $table->trackableTimestamps();
            $table->restorableSoftDeletes();
            $table->primary(['user_id', 'article_id']);
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
