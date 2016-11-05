<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateArticleSectionTypes extends Migration
{

    public $table = 'article_section_types';

    public function up()
    {
        $this->schema()->create($this->table, function (Blueprint $table) {

            $table->increments('id');

            $table->nomen();
            $table->stamps();

            $table->actions();

        });
    }

    public function down()
    {

         $this->schema()->dropIfExists($this->table);

    }
}
