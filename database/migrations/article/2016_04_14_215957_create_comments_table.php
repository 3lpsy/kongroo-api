<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->smallInteger('article_id')->unsigned();
            $table->smallInteger('section_id')->nullable()->unsigned();
            $table->smallInteger('author_id')->unsigned();
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
        Schema::drop('comments');
    }
}
