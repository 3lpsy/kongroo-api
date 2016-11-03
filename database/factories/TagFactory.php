<?php


$factory->define(config('models.tag.class'), function (Faker\Generator $faker) {
    return [
        'name' => $name = snake_case($faker->word),
        'display_name' => $name,
        'slug' => str_slug($name)
    ];
});


