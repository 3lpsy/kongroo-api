<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FkArticleSectionsTable extends Migration
{

    public $table = 'article_sections';

    public function up()
    {
         $this->schema()->table($this->table, function (Blueprint $table) {

             $table->fk('article_id');
             $table->fkActions();

        });
    }

    public function down()
    {
         $this->schema()->table($this->table, function (Blueprint $table) {

             $table->dropFk('article_id');
             $table->dropActions();

        });
    }
}
