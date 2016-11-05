<?php

$factory->define(config('models.section_type.namespace'), function (Faker\Generator $faker) {
    return [
        'name' => $name = $faker->word,
        'display_name' => ucfirst($name),
        'description' => $faker->sentence,
    ];
});
