<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FkArticleSeriesTable extends Migration
{
    public function up()
    {
        $this->schema()->table('article_series', function (Blueprint $table) {

            $table->slowForeign('article_id', 'id', 'articles', 'CASCADE', "CASCADE");

            $table->slowForeign('series_id', 'id', 'series', 'CASCADE', "CASCADE");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema()->table('article_series', function(Blueprint $table) {

            $table->quickDropForeign('article_series', 'article_id');

            $table->quickDropForeign('article_series', 'series_id');

        });
    }
}
