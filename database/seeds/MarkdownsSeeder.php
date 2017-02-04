<?php

use App\Models\Markdown\Markdown;
use Illuminate\Database\Seeder;

class MarkdownsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $markdowns = factory(config('models.markdown.namespace'), 20)->create();
    }
}
