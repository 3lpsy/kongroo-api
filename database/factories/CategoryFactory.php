<?php

$factory->define(config('models.category.class'), function (Faker\Generator $faker) {
    return [
        'name' => $name = $faker->word,
        'slug' => slugify($name)
    ];
});