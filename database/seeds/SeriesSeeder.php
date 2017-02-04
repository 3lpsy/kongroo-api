<?php

use Illuminate\Database\Seeder;
use App\Models\Tag\Tag;
use App\Models\Access\User\User;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::all();

        $user = User::find(2);

        $series = factory(config('models.series.namespace'), 3)->create()->each(function ($series) use ($tags, $user) {
            $series->tag($tags->random());
        });
    }
}
