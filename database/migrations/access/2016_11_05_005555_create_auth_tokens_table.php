<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateAuthTokensTable extends Migration
{
    public $table = 'auth_tokens';

    public function up()
    {
        $this->schema()->create($this->table, function (Blueprint $table) {
            $table->smallIncrements('id');

            $table->fkInteger('user_id');

            $table->fkInteger('auth_token');

            $table->fkInteger('auth_provider');

            $table->stamps();

            $table->actions();
        });
    }

    public function down()
    {
        $this->schema()->dropIfExists($this->table);
    }
}
