<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FkPhones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->table('phones', function (Blueprint $table) {

            $table->slowForeign('type_id', 'id', 'phone_types', 'CASCADE', 'SET NULL');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema()->table('phones', function (Blueprint $table) {

            $table->quickDropForeign('phones', 'type_id');

        });
    }
}
