<?php

$factory->define(config('models.markdown.class'), function (Faker\Generator $faker) {
    return [
        'body' => $faker->paragraph(4)
    ];
});
