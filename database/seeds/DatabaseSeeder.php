<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env("DB_DRIVER") === 'mysql') {
            \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        $this->call(TruncateTables::class);
        $this->call(InitSeederAccess::class);
        $this->call(InitSuperUserAccess::class);
        $this->call(TagsSeeder::class);
        $this->call(SeriesSeeder::class);
        $this->call(SectionTypesSeeder::class);
        $this->call(VideosSeeder::class);
        $this->call(MarkdownsSeeder::class);
        $this->call(ImagesSeeder::class);
        $this->call(ArticlesSeeder::class);
        $this->call(ArticleSectionsSeeder::class);
        $this->call(TokenProvidersSeeder::class);
        $this->call(TokenTypesSeeder::class);

        if (env("DB_DRIVER") === 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
