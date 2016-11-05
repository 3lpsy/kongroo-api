<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateAuditActionTypeTable extends Migration
{

    public $table = 'audit_action_type';

    public function up()
    {
        $this->schema()->create($this->table, function (Blueprint $build) {

            $build->increments('id');

            $build->stamps();

            $build->actions();

        });
    }

    public function down()
    {

         $this->schema()->dropIfExists($this->table);
         
    }
}
