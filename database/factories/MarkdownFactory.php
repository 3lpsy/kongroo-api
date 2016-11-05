<?php

$factory->define(config('models.markdown.namespace'), function (Faker\Generator $faker) {
    return [
        'body' => $faker->paragraph(4)
    ];
});
