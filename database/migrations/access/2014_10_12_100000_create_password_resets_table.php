<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    public $table = "tokens";

    public function up()
    {
        $this->schema()->create($this->table, function (Blueprint $table) {
            $table->fkInteger('user_id', 'small');
            $table->string('token')->unique()->index();
            $table->fkInteger('status_id', 'small');
            $table->fkInteger('provider_id');
            $table->fkInteger('type_id');
            $table->fkInteger('group_id');
            $table->stamp('expires_at');
            $table->stamps();
            $table->actions();
            $table->primary(["token"]);
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
