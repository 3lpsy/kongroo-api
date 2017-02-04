<?php

$factory->define(config('models.section.namespace'), function (Faker\Generator $faker) {
    return [
        'title' => $header = $faker->sentence(3),
        'description' => $faker->word,
        'sort' => rand(0, 20),
        'slug' => str_slug($header)
    ];
});

$factory->defineAs(config('models.section.namespace'), 'markdown', function (Faker\Generator $faker) {
    return [
        'title' => $header = $faker->sentence(3),
        'description' => $faker->word,
        'sort' => rand(0, 20),
        'slug' => str_slug($header),
        'contentable_id' => function () {
            return factory(config('models.content_markdown.namespace'))->create()->id;
        },
        'contentable_type' => 'content_markdown'
    ];
});



$factory->defineAs(config('models.section.namespace'), 'video', function (Faker\Generator $faker) {
    return [
        'title' => $header = $faker->sentence(3),
        'description' => $faker->word,
        'sort' => rand(0, 20),
        'slug' => str_slug($header),
        'contentable_id' => function () {
            return factory(config('models.content_video.namespace'))->create()->id;
        },
        'contentable_type' => 'content_video'
    ];
});
