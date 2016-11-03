<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FkArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->table('articles', function (Blueprint $table) {

            $table->slowForeign('author_id', 'id', 'users', 'CASCADE', 'CASCADE');

            $table->slowForeign('published_by_id', 'id', 'users', 'CASCADE', 'CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema()->table('articles', function (Blueprint $table) {

            $table->quickDropForeign('articles', 'author_id');

            $table->quickDropForeign('articles', 'published_by_id');

        });
    }
}
