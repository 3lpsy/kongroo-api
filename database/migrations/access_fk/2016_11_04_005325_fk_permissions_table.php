<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FkPermissionsTable extends Migration
{

    public $table = 'permissions';

    public function up()
    {
         $this->schema()->table($this->table, function (Blueprint $table) {

            $table->fk('type_id', 'permission_types');
            $table->fkActions();

        });
    }

    public function down()
    {
         $this->schema()->table($this->table, function (Blueprint $table) {

             $table->dropFk('type_id');
             $table->dropActions();

        });
    }
}
