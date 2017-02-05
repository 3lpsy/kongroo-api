<?php

$factory->define(config('models.comment.namespace'), function (Faker\Generator $faker) {
    return [
        'body' => $faker->paragraph(3),
        'author_id' => function() {
            factory(config('models.user.namespace'))->create()->first()->id;
        },
        'article_id' => function() {
            factory(config('models.article.namespace'))->create()->first()->id;
        },
        'slug' => $faker->slug
    ];
});
