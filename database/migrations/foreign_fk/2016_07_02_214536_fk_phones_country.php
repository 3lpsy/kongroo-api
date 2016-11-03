<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FkPhonesCountry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->table('phones', function (Blueprint $table) {

            $table->slowForeign('country_id', 'id', 'countries', 'CASCADE', 'SET NULL');

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

            $table->quickDropForeign('phones', 'country_id');

        });
    }
}
