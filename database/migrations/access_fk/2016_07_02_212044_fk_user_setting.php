<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FkUserSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->table('users', function (Blueprint $table) {

            $table->fk('settings_id', 'user_settings');

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
        $this->schema()->table('users', function (Blueprint $table) {

            $table->dropFk('settings_id');

            $table->dropActions();


        });

    }
}
