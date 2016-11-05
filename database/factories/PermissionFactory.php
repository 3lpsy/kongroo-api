<?php


$factory->define(config('models.permission.namespace'), function (Faker\Generator $faker) {
    return [
        'name' => $name = $faker->word,
        'display_name' => ucfirst($name),
        'description' => substr($faker->sentence, 0, 20),
        'slug' =>  $faker->slug,
    ];
});

$factory->defineAs(config('models.permission.namespace'), 'super', function (Faker\Generator $faker) {
    return [
        'name' => 'super',
        'display_name' => "Super",
        'description' => "God Mode",
        'slug' =>  $faker->slug,
    ];
});

$factory->defineAs(config('models.permission.namespace'), 'super-bot', function (Faker\Generator $faker) {
    return [
        'name' => 'super-bot',
        'display_name' => "Super Bot",
        'description' => "Robot God Mode",
        'slug' => $faker->slug
    ];
});
