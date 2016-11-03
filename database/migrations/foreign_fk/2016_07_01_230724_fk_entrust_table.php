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

            $table->quickForeign('user_id', "CASCADE", "CASCADE");

            $table->quickForeign('role_id', "CASCADE", "CASCADE");

        });

        $this->schema()->table('role_dependency', function (Blueprint $table) {

            $table->quickForeign('role_id', "CASCADE", "CASCADE");

            $table->slowForeign('dependency_id', 'id', 'roles', 'CASCADE', 'CASCADE');

        });



        // Create table for associating permissions to roles (Many-to-Many)
        $this->schema()->table('permission_role', function (Blueprint $table) {

            $table->quickForeign('permission_id', "CASCADE", "CASCADE");

            $table->quickForeign('role_id', "CASCADE", "CASCADE");

        });

        // Create table for associating permissions to roles (Many-to-Many)
        $this->schema()->table('permission_dependency', function (Blueprint $table) {

            $table->quickForeign('permission_id', "CASCADE", "CASCADE");

            $table->slowForeign('dependency_id', 'id', 'permissions', 'CASCADE', 'CASCADE');

        });

    }

    public function down()
    {

        $this->schema()->table('role_user', function(Blueprint $table){

            $table->quickDropForeign('role_user', 'user_id');

            $table->quickDropForeign('role_user', 'role_id');

        });

        $this->schema()->table('permission_role', function(Blueprint $table){

            $table->quickDropForeign('permission_role', 'role_id');

            $table->quickDropForeign('permission_role', 'permission_id');

        });

        $this->schema()->table('permission_dependency', function(Blueprint $table){

            $table->quickDropForeign('permission_dependency', 'permission_id');

            $table->quickDropForeign('permission_dependency', 'dependency_id');

        });

        $this->schema()->table('role_dependency', function(Blueprint $table){

            $table->quickDropForeign('role_dependency', 'role_id');

            $table->quickDropForeign('role_dependency', 'dependency_id');

        });
    }
}
