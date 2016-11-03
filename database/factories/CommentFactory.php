<?php

$factory->define(config('models.comment.class'), function (Faker\Generator $faker) {
    return [
        'body' => $faker->paragraph(3),
        'author_id' => function() {
            factory(config('models.user.class'))->create()->id;
        },
        'article_id' => function() {
            factory(config('models.article.class'))->create()->id;
        },
        'slug' => randSlug()
    ];
});
