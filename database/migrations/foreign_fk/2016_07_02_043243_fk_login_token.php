<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FkLoginToken extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->table('login_tokens', function (Blueprint $table) {

            $table->quickForeign('user_id', "CASCADE", "CASCADE");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema()->table('login_tokens', function (Blueprint $table) {

            $table->quickDropForeign('login_tokens', 'user_id');

        });
    }
}
