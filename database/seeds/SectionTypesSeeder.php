<?php

use Illuminate\Database\Seeder;

class SectionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $markdownType = factory(config('models.section_type.namespace'))->create([
            'name' => 'markdown',
            'display_name' => 'Markdown'
        ]);


        $videoType = factory(config('models.section_type.namespace'))->create([
            'name' => 'video',
            'display_name' => 'Video'
        ]);
    }
}
