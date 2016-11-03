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

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table(config('models.tag.table'))->truncate();
        \DB::table(config('models.series.table'))->truncate();
        \DB::table("articles")->truncate();
        \DB::table("article_sections")->truncate();
        \DB::table("content_markdown")->truncate();
        \DB::table("article_section_types")->truncate();
        \DB::table("markdowns")->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $tags = factory(config('models.tag.class'), 20)->create()->each(function($tag) use ($user){
            $tag->changeStatus("active")
                ->changeCreatedBy($user)
                ->changeUpdatedBy($user);
        });

        $series = factory(config('models.series.class'), 3)->create()->each(function($series) use ($tags, $user){
            $series->changeStatus("active")
                ->changeCreatedBy($user)
                ->changeUpdatedBy($user);
            $series->tag($tags->random());
        });


        $markdownType = factory(config('models.sectionType.class'))->create([
            'name' => 'markdown',
            'display_name' => 'Markdown'
        ]);


        $videoType = factory(config('models.sectionType.class'))->create([
            'name' => 'video',
            'display_name' => 'Video'
        ]);

        $types = collect([$markdownType, $videoType]);

        $types->each(function($type) use ($user) {
            $type->changeStatus("active")
                ->changeCreatedBy($user)
                ->changeUpdatedBy($user);
        });

        $articles = factory(config('models.article.class'), 'pubished-plain', 60)->create(['author_id' => $user->id])->each(function($article) use ($user, $types, $tags) {
            $article->authoredBy($user)
                ->publishedBy($user)
                ->changeStatus("active")
                ->changeCreatedBy($user)
                ->changeUpdatedBy($user)
                ->tag($tags->random());

           $sections = factory(config('models.section.class'), 3)->create(['article_id' => $article->id, 'type_id' => $types->random()->id])->each(function($section) use ($user) {
                $section->changeStatus("active")
                ->changeCreatedBy($user)
                ->changeUpdatedBy($user);
           });
        });
    }
}
