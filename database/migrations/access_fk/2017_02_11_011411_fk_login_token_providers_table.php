<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FkLoginTokenProvidersTable extends Migration
{
    public $table = 'token_providers';

    public function up()
    {
        $this->schema()->table($this->table, function (Blueprint $table) {
            $table->fk("provider_id", "login_token_providers");

            $table->fkActions();
        });
    }

    public function down()
    {
        $this->schema()->table($this->table, function (Blueprint $table) {
            $table->dropActions();
        });
    }
}
