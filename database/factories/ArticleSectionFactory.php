<?php

$factory->define(config('models.section.class'), function (Faker\Generator $faker) {
    return [
        'header' => $header = $faker->sentence(3),
        'description' => $faker->word,
        'sort' => rand(0, 20),
        'slug' => slugify($header),
        'contentable_id' => function() {
            return factory(config('models.contentMarkdown.class'))->create()->id;
        },
        'contentable_type' => 'content_markdown'
    ];
});