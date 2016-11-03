<?php

$factory->define(config('models.sectionType.class'), function (Faker\Generator $faker) {
    return [
        'name' => $name = $faker->word,
        'display_name' => ucfirst($name),
        'description' => $faker->sentence,
        'slug' => slugify($name),
    ];
});
