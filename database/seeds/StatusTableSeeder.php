<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table("statuses")->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        factory(config('models.status.class'), 'active')->create();
        factory(config('models.status.class'), 'private')->create();
        factory(config('models.status.class'), 'pending')->create();
        factory(config('models.status.class'), 'disabled')->create();
        factory(config('models.status.class'), 'banned')->create();
        factory(config('models.status.class'), 'junk')->create();
    }
}
