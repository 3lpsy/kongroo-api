<?php

use Illuminate\Database\Seeder;
use App\Models\Access\User\User;
use App\Models\Tag\Tag;
use App\Models\Series\Series;
use App\Models\Article\Section\Type\ArticleSectionType;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(2);

        $tags = Tag::all();

        $types = ArticleSectionType::all();

        $articles = factory(config('models.article.namespace'), 'pubished-plain', 60)
            ->create(['author_id' => $user->id])
            ->each(function ($article) use ($user, $types, $tags) {
                $tagged = $tags->random();

                $article->authoredBy($user)
                    ->publishedBy($user)
                    ->tag($tagged);

                $article->tag($tags->filter(function ($tag) use ($tagged) {
                    return $tag->id !== $tagged->id;
                })->random());
            });
    }
}
