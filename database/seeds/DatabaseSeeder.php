<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatusTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(InitAutoUserTableSeeder::class);
        $this->call(InitSuperUserTableSeeder::class);
        $this->call(ArticlesSeeder::class);

    }
}
