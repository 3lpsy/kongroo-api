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
            $table->integer('comment_id')->unsigned();
            $table->integer('commentable_id');
            $table->string('commentable_type');
            $table->status();
            $table->trackableTimestamps();
            $table->restorableSoftDeletes();
            $table->index(['comment_id', 'commentable_id', 'commentable_type']);
            $table->primary(['comment_id', 'commentable_id', 'commentable_type']);
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
