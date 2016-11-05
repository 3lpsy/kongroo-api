<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateContentMarkdownTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('content_markdown', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string("provider")->default("local");
            $table->string("markdown_id")->nullable();
            $table->string("markdown_src")->nullable();;
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
        $this->schema()->drop('content_markdown');
    }
}
