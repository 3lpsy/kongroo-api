<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('articles', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->nomen();
            $table->title();
            $table->subTitle();
            $table->integer('views')->default(0);
            $table->slug();
            $table->fkInteger('author_id', 'small');
            $table->stamps();
            $table->stamp("published_at");
            $table->action("published");

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
        Schema::drop('articles');
    }
}
