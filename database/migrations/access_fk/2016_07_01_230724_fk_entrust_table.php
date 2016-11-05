<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FkEntrustTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        $this->schema()->table('role_user', function (Blueprint $table) {

            $table->fk('user_id');

            $table->fk('role_id');

            $table->fkActions();


        });

        $this->schema()->table('role_dependency', function (Blueprint $table) {

            $table->fk('role_id');

            $table->fk('dependency_id', 'roles');

            $table->fkActions();


        });



        // Create table for associating permissions to roles (Many-to-Many)
        $this->schema()->table('permission_role', function (Blueprint $table) {

            $table->fk('permission_id');

            $table->fk('role_id');

            $table->fkActions();


        });

        // Create table for associating permissions to roles (Many-to-Many)
        $this->schema()->table('permission_dependency', function (Blueprint $table) {

            $table->fk('permission_id');

            $table->fk('dependency_id', 'permissions');

            $table->fkActions();


        });

    }

    public function down()
    {

        $this->schema()->table('role_user', function(Blueprint $table){

            $table->dropFk('user_id');

            $table->dropFk('role_id');

            $table->dropActions();


        });

        $this->schema()->table('permission_role', function(Blueprint $table){

            $table->dropFk('role_id');

            $table->dropFk('permission_id');

            $table->dropActions();


        });

        $this->schema()->table('permission_dependency', function(Blueprint $table){

            $table->dropFk('permission_id');

            $table->dropFk('dependency_id');

            $table->dropActions();


        });

        $this->schema()->table('role_dependency', function(Blueprint $table){

            $table->dropFk('role_id');

            $table->dropFk('dependency_id');

            $table->dropActions();

        });
    }
}
