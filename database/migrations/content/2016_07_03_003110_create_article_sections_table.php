<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateArticleSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('article_sections', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->fkInteger('article_id', 'small');
            $table->title();
            $table->description();
            $table->smallInteger('sort')->unsigned()->default(1);
            $table->fkInteger('contentable_id');
            $table->string('contentable_type');
            $table->fkInteger('type_id');
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
        Schema::drop('article_sections');
    }
}
