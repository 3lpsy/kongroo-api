<?php

use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = factory(config('models.status.namespace'))->create([
            'name' => 'published',
            'display_name' => 'Published',
            'description' => "Is Published"
        ]);
    }
}
