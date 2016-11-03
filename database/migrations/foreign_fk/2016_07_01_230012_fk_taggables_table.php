<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FkTaggablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->table('taggables', function (Blueprint $table) {

            $table->slowForeign('tag_id', 'id', 'tags', 'CASCADE', "CASCADE");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema()->table('taggables', function(Blueprint $table){

            $table->quickDropForeign('taggables', 'tag_id');
        });
    }
}
