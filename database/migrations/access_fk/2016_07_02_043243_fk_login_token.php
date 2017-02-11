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
        $this->schema()->table('tokens', function (Blueprint $table) {
            $table->fk('user_id');

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
        $this->schema()->table('tokens', function (Blueprint $table) {
            $table->dropFk('user_id');

            $table->dropActions();
        });
    }
}
