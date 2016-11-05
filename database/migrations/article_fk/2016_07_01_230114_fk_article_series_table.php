<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FkArticleSeriesTable extends Migration
{
    public function up()
    {
        $this->schema()->table('article_series', function (Blueprint $table) {

            $table->fk('article_id');

            $table->fk('series_id');

            $table->fkActions();

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

            $table->dropFk('article_id');

            $table->dropFk('series_id');

            $table->dropActions();


        });
    }
}
