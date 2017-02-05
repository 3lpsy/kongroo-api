<?php

use App\Models\Video\Video;
use Illuminate\Database\Seeder;

class VideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $videos = factory(config('models.video.namespace'), 4)->create();

        $videos->each(function ($video) {
            $source = factory(config('models.video_source.namespace'), 'mp4')->create()->first();

            $video->attachSource($source);

            $source = factory(config('models.video_source.namespace'), 'webm')->create()->first();

            $video->attachSource($source);

            $source = factory(config('models.video_source.namespace'), 'avi')->create()->first();

            $video->attachSource($source);
        });
    }
}
