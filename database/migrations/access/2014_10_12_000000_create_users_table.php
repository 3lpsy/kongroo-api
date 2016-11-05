<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public $table = "users";

    public function up()
    {
        $this->schema()->create($this->table, function (Blueprint $table) {

            $table->smallIncrements('id');
            $table->string('first_name', 32);
            $table->string('last_name', 32);
            $table->string('middle_name', 32)->nullabe();
            $table->fkInteger('settings_id', 'small');
            $table->string('email', 64)->unique();
            $table->slug();
            $table->rememberToken();
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
        Schema::drop($this->table);
    }
}
