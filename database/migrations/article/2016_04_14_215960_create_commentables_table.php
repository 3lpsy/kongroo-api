<?php

use Illuminate\Support\Facades\Schema;
use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateCommentablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('commentables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comment_id')->unsigned();
            $table->integer('commentable_id');
            $table->string('commentable_type');
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
        Schema::drop('commentables');
    }
}
