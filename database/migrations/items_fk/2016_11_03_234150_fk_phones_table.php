<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FkPhonesTable extends Migration
{

    public $table = 'phones';

    public function up()
    {
         $this->schema()->table($this->table, function (Blueprint $table) {

             $table->fk('user_id');

             $table->fk('type_id', 'phone_types');
             $table->fk('country_id');

            $table->fkActions();

        });
    }

    public function down()
    {
         $this->schema()->table($this->table, function (Blueprint $table) {

             $table->dropFk("user_id");

             $table->dropFk("type_id");
             $table->dropFk("country_id");

             $table->dropActions();

        });
    }
}
