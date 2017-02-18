<?php


$factory->define(config('models.category.namespace'), function (Faker\Generator $faker) {
    return [
        'name' => $name = snake_case($faker->company),
        'display_name' => $name,
        'slug' => str_slug($name)
    ];
});
