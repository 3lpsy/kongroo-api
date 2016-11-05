<?php

$factory->define(config('models.article.namespace'), function (Faker\Generator $faker) {
    return [
        'title' => $title = $faker->sentence(3),
        'sub_title' => $faker->sentence(3),
        'slug' => str_slug($title),
        'author_id' => function() {
            return factory(config('models.user.namespace'))->create()->id;
        },
        'published_at' => $faker->dateTime('now'),
    ];
});

$factory->defineAs(config('models.article.namespace'), 'published', function (Faker\Generator $faker) {
    return [
        'title' => $title = $faker->sentence(3),
        'sub_title' => $faker->sentence(3),
        'slug' => str_slug($title),
        'author_id' => function() {
            return factory(config('models.user.namespace'))->create()->id;
        },
        'published_at' => $faker->dateTimeBetween($startDate = "-10 days", $endDate = "-1 days"),
    ];
});

$factory->defineAs(config('models.article.namespace'), 'unpublished', function (Faker\Generator $faker) {
    return [
        'title' => $title = $faker->sentence(3),
        'sub_title' => $faker->sentence(3),
        'slug' => str_slug($title),
        'author_id' => function() {
            return factory(config('models.user.namespace'))->create()->id;
        },
        'published_at' => $faker->dateTimeBetween($startDate = "+1 days", $endDate = "+10 days"),
    ];
});

$factory->defineAs(config('models.article.namespace'), 'pubished-plain', function (Faker\Generator $faker) {
    return [
        'title' => $title = $faker->sentence(3),
        'sub_title' => $faker->sentence(3),
        'slug' => str_slug($title),
        'views' => rand(5,1000),
        'published_at' => $faker->dateTimeBetween($startDate = "-10 days", $endDate = "-1 days"),
    ];
});

$factory->defineAs(config('models.article.namespace'), 'unpubished-plain', function (Faker\Generator $faker) {
    return [
        'title' => $title = $faker->sentence(3),
        'sub_title' => $faker->sentence(3),
        'slug' => str_slug($title),
        'views' => rand(5,1000),
        'published_at' => $faker->dateTimeBetween($startDate = "+1 days", $endDate = "+10 days"),
    ];
});