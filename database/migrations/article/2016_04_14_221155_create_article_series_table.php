<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateArticleSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('article_series', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->smallInteger('article_id')->unsigned();
            $table->smallInteger('series_id')->unsigned();
            $table->smallInteger('sort')->unsigned()->default(1);
            $table->tinyInteger('supplementary')->unsigned()->default(0);
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
        Schema::drop('article_series');
    }
}
