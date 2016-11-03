<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FkUserPhoneSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->table('users', function (Blueprint $table) {

            $table->slowForeign('settings_id', 'id', 'user_settings', 'CASCADE', 'SET NULL');

        });

        $this->schema()->table('phones', function (Blueprint $table) {

            $table->quickForeign('user_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema()->table('users', function (Blueprint $table) {

            $table->quickDropForeign('users', 'settings_id');

        });

        $this->schema()->table('phones', function (Blueprint $table) {

            $table->quickDropForeign('phones', 'user_id');

        });
    }
}
