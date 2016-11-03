<?php

$factory->define(config('models.article.class'), function (Faker\Generator $faker) {
    return [
        'title' => $title = $faker->sentence(3),
        'sub_title' => $faker->sentence(3),
        'slug' => slugify($title),
        'author_id' => function() {
            return factory(config('models.user.class'))->create()->id;
        },
        'published_at' => $faker->dateTime('now'),
    ];
});

$factory->defineAs(config('models.article.class'), 'published', function (Faker\Generator $faker) {
    return [
        'title' => $title = $faker->sentence(3),
        'sub_title' => $faker->sentence(3),
        'slug' => slugify($title),
        'author_id' => function() {
            return factory(config('models.user.class'))->create()->id;
        },
        'published_at' => $faker->dateTimeBetween($startDate = "-10 days", $endDate = "-1 days"),
    ];
});

$factory->defineAs(config('models.article.class'), 'unpublished', function (Faker\Generator $faker) {
    return [
        'title' => $title = $faker->sentence(3),
        'sub_title' => $faker->sentence(3),
        'slug' => slugify($title),
        'author_id' => function() {
            return factory(config('models.user.class'))->create()->id;
        },
        'published_at' => $faker->dateTimeBetween($startDate = "+1 days", $endDate = "+10 days"),
    ];
});

$factory->defineAs(config('models.article.class'), 'pubished-plain', function (Faker\Generator $faker) {
    return [
        'title' => $title = $faker->sentence(3),
        'sub_title' => $faker->sentence(3),
        'slug' => slugify($title),
        'views' => rand(5,1000),
        'published_at' => $faker->dateTimeBetween($startDate = "-10 days", $endDate = "-1 days"),
    ];
});

$factory->defineAs(config('models.article.class'), 'unpubished-plain', function (Faker\Generator $faker) {
    return [
        'title' => $title = $faker->sentence(3),
        'sub_title' => $faker->sentence(3),
        'slug' => slugify($title),
        'views' => rand(5,1000),
        'published_at' => $faker->dateTimeBetween($startDate = "+1 days", $endDate = "+10 days"),
    ];
});