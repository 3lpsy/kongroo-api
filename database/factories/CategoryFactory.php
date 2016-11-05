<?php

$factory->define(config('models.category.namespace'), function (Faker\Generator $faker) {
    return [
        'name' => $name = $faker->word,
        'slug' => str_slug($name)
    ];
});