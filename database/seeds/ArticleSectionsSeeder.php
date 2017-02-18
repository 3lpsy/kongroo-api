<?php

use Illuminate\Database\Seeder;
use App\Models\Article\Article;
use App\Models\Video\Video;
use App\Models\Markdown\Markdown;

use App\Models\Article\Section\Type\ArticleSectionType;

class ArticleSectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ArticleSectionType::all();

        $articles = Article::all();

        $videos = Video::all();

        $markdowns = Markdown::all();

        $articles->each(function ($article) use ($types, $videos) {
            $video = $videos->random()->first();

            $content = factory(config('models.content_video.namespace'))->create([
                'video_id' => $video->id
            ])->first();

            $section = factory(config('models.section.namespace'), 1)
                ->create([
                    'article_id' => $article->id,
                    'contentable_id' => $content->id,
                    'contentable_type' => $content->getMorphType(),
                    'type_id' => $types->first(function ($type) {
                        return $type->name === 'video';
                    })->id
                ])->first();
        });

        $articles->each(function ($article) use ($types, $markdowns) {
            $mark = $markdowns->random()->first();

            $content = factory(config('models.content_markdown.namespace'))->create([
                'markdown_id' => $mark->id
            ])->first();

            $section = factory(config('models.section.namespace'), 1)
                ->create([
                    'article_id' => $article->id,
                    'contentable_id' => $content->id,
                    'contentable_type' => $content->getMorphType(),
                    'type_id' => $types->first(function ($type) {
                        return $type->name === 'markdown';
                    })->id
                ])->first();
        });

        $articles->each(function ($article) use ($types, $markdowns) {
            $mark = $markdowns->random()->first();

            $content = factory(config('models.content_markdown.namespace'))->create([
                'markdown_id' => $mark->id
            ])->first();

            $section = factory(config('models.section.namespace'), 1)
                ->create([
                    'article_id' => $article->id,
                    'contentable_id' => $content->id,
                    'contentable_type' => $content->getMorphType(),
                    'type_id' => $types->first(function ($type) {
                        return $type->name === 'markdown';
                    })->id
                ])->first();
        });
    }
}
