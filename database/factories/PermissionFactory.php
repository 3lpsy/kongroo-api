<?php


$factory->define(config('models.permission.class'), function (Faker\Generator $faker) {
    return [
        'name' => $name = $faker->word,
        'display_name' => ucfirst($name),
        'description' => substr($faker->sentence, 0, 20),
        'slug' => str_random(20),
    ];
});

$factory->defineAs(config('models.permission.class'), 'super', function (Faker\Generator $faker) {
    return [
        'name' => 'super',
        'display_name' => "Super",
        'description' => "God Mode",
        'slug' => str_random(20),
    ];
});

$factory->defineAs(config('models.permission.class'), 'super-bot', function (Faker\Generator $faker) {
    return [
        'name' => 'super-bot',
        'display_name' => "Super Bot",
        'description' => "Robot God Mode",
        'slug' => str_random(20)
    ];
});