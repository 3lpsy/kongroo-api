<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateArticleContentsTable extends Migration
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
            $table->smallInteger('article_id')->unsigned()->nullable();
            $table->string('header')->nullable();
            $table->string('description')->nullable();
            $table->smallInteger('sort')->unsigned()->default(1);
            $table->integer('contentable_id')->unsigned();
            $table->string('contentable_type');
            $table->smallInteger('type_id');
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
        Schema::drop('article_sections');
    }
}
