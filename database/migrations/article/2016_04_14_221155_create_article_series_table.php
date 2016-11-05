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
            $table->increments('id');
            $table->fkInteger('article_id', 'small');
            $table->fkInteger('series_id', 'small');
            $table->smallInteger('sort')->unsigned()->default(1);
            $table->tinyInteger('supplementary')->unsigned()->default(0);
            $table->slug();
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
        Schema::drop('article_series');
    }
}
