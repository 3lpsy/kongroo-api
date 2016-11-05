<?php

use Illuminate\Database\Seeder;
use App\Models\Access\User\User;
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


        $tags = factory(config('models.tag.namespace'), 20)->create();

        $series = factory(config('models.series.namespace'), 3)->create()->each(function($series) use ($tags, $user){
            $series->tag($tags->random());
        });


        $markdownType = factory(config('models.section_type.namespace'))->create([
            'name' => 'markdown',
            'display_name' => 'Markdown'
        ]);


        $videoType = factory(config('models.section_type.namespace'))->create([
            'name' => 'video',
            'display_name' => 'Video'
        ]);

        $types = collect([$markdownType, $videoType]);

        $articles = factory(config('models.article.namespace'), 'pubished-plain', 60)->create(['author_id' => $user->id])->each(function($article) use ($user, $types, $tags) {
            $article->authoredBy($user)
                ->publishedBy($user)
                ->tag($tags->random());

           $sections = factory(config('models.section.namespace'), 3)
                ->create(['article_id' => $article->id, 'type_id' => $types->random()->id]);
        });
    }
}
