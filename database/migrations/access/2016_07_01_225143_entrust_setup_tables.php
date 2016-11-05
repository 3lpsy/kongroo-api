<?php
use App\Services\Illuminate\Database\Migrations\Migration;
use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;

class EntrustSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // Create table for storing roles
        $this->schema()->create('roles', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->nomen();
            $table->slug();
            $table->stamps();
            $table->actions();
        });

        $this->schema()->create('role_dependency', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->fkInteger('role_id', 'small');
            $table->fkInteger('dependency_id', 'small');
            $table->stamps();
            $table->actions();
        });

        // Create table for associating roles to users (Many-to-Many)
        $this->schema()->create('role_user', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->fkInteger('user_id', 'small');
            $table->fkInteger('role_id', 'small');
            $table->stamps();
            $table->actions();
        });

        // Create table for storing permissions
        $this->schema()->create('permissions', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->nomen();
            $table->fkInteger('type_id', 'small');
            $table->slug();
            $table->stamps();
            $table->actions();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        $this->schema()->create('permission_role', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->fkInteger('permission_id', 'small');
            $table->fkInteger('role_id', 'small');
            $table->slug();
            $table->stamps();
            $table->actions();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        $this->schema()->create('permission_dependency', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->fkInteger('permission_id', 'small');
            $table->fkInteger('dependency_id', 'small');
            $table->stamps();
            $table->actions();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('permission_role');
        Schema::drop('permission_dependency');
        Schema::drop('permissions');
        Schema::drop('role_user');
        Schema::drop('role_dependency');
        Schema::drop('roles');
    }
}
