<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FkViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->table('views', function (Blueprint $table) {

            $table->slowForeign('user_id', 'id', 'users', 'CASCADE', "CASCADE");
            $table->slowForeign('article_id', 'id', 'articles', 'CASCADE', "CASCADE");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema()->table('views', function(Blueprint $table){

            $table->quickDropForeign('views', 'user_id');

            $table->quickDropForeign('views', 'article_id');


        });
    }
}
