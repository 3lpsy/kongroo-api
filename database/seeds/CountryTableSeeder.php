<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table("countries")->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(config('models.country.class'), 'america')->create();
        factory(config('models.country.class'), 'canada')->create();
        factory(config('models.country.class'), 'mexico')->create();


    }
}
