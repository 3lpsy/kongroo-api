<?php

use Illuminate\Database\Seeder;

class AccessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table("articles")->truncate();
        \DB::table("article_sections")->truncate();
        \DB::table("article_section_types")->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
