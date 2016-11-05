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

            $table->fk('user_id');
            $table->fk('article_id');
            $table->fkActions();

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

            $table->dropFk('user_id');

            $table->dropFk( 'article_id');

            $table->dropActions();


        });
    }
}
