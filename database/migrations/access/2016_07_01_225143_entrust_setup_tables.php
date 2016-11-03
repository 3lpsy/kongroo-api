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
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description', 64)->nullable();
            $table->slug();
            $table->status();
            $table->trackableTimestamps();
            $table->restorableSoftDeletes();
        });

        $this->schema()->create('role_dependency', function (Blueprint $table) {
            $table->smallInteger('role_id')->unsigned();
            $table->smallInteger('dependency_id')->unsigned();
            $table->status();
            $table->trackableTimestamps();
            $table->restorableSoftDeletes();
            $table->primary(['role_id', 'dependency_id']);
        });

        // Create table for associating roles to users (Many-to-Many)
        $this->schema()->create('role_user', function (Blueprint $table) {
            $table->smallInteger('user_id')->unsigned();
            $table->smallInteger('role_id')->unsigned();
            $table->status();
            $table->trackableTimestamps();
            $table->restorableSoftDeletes();
            $table->primary(['user_id', 'role_id']);
        });

        // Create table for storing permissions
        $this->schema()->create('permissions', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description', 64)->nullable();
            $table->slug();
            $table->status();
            $table->trackableTimestamps();
            $table->restorableSoftDeletes();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        $this->schema()->create('permission_role', function (Blueprint $table) {
            $table->smallInteger('permission_id')->unsigned();
            $table->smallInteger('role_id')->unsigned();
            $table->slug();
            $table->status();
            $table->trackableTimestamps();
            $table->restorableSoftDeletes();
            $table->primary(['permission_id', 'role_id']);
        });

        // Create table for associating permissions to roles (Many-to-Many)
        $this->schema()->create('permission_dependency', function (Blueprint $table) {
            $table->smallInteger('permission_id')->unsigned();
            $table->smallInteger('dependency_id')->unsigned();
            $table->status();
            $table->trackableTimestamps();
            $table->restorableSoftDeletes();
            $table->primary(['permission_id', 'dependency_id']);
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
