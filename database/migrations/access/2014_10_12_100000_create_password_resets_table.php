<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    public $table = "login_tokens";

    public function up()
    {
        $this->schema()->create($this->table, function (Blueprint $table) {
            $table->smallInteger('user_id')->unsigned()->unique();
            $table->string('token')->unique()->index();
            $table->smallInteger('status_id')->unsigned()->nullable();
            $table->timestamp('expires_at');
            $table->trackableTimestamps();
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
