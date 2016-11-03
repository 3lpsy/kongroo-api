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
            $table->string('title', 64);
            $table->string('sub_title', 64)->nullable();
            $table->text('description')->nullable();
            $table->integer('views')->default(0);
            $table->slug();
            $table->smallInteger('author_id')->unsigned();
            $table->status();
            $table->trackableTimestamp("published");
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
        Schema::drop('articles');
    }
}
