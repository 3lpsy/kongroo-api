<?php

$factory->define(config('models.series.namespace'), function (Faker\Generator $faker) {
    return [
        'title' => $name = snake_case($faker->word),
        'sub_title' => $name,
        'slug' => str_slug($name)
    ];
});
