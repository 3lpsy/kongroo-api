<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateAuditActionsTable extends Migration
{

    public $table = 'audit_actions';

    public function up()
    {
        $this->schema()->create($this->table, function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->stamps();

            $table->actions();

        });
    }

    public function down()
    {

         $this->schema()->dropIfExists($this->table);

    }
}
