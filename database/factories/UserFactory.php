<?php


$factory->define(config('models.user.namespace'), function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'slug' => $faker->slug
    ];
});

$factory->defineAs(config('models.user.namespace'), 'default', function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'slug' => $faker->slug
    ];
});

$factory->defineAs(config('models.user.namespace'), 'super', function (Faker\Generator $faker) {
    return [
        'first_name' => env("APP_SUPER_USER_FIRST_NAME", 'super'),
        'middle_name' => $faker->firstName,
        'last_name' => env("APP_SUPER_USER_LAST_NAME", 'user'),
        'email' => env("APP_SUPER_USER_EMAIL", $faker->email),
        'slug' => $faker->slug
    ];
});

$factory->defineAs(config('models.user.namespace'), 'super-bot', function (Faker\Generator $faker) {
    return [
        'first_name' => env("APP_SUPER_BOT_FIRST_NAME", "super"),
        'middle_name' => $faker->firstName,
        'last_name' => env("APP_SUPER_BOT_LAST_NAME", "bot"),
        'email' => env("APP_SUPER_BOT_EMAIL", $faker->email),
        'slug' => $faker->slug
    ];
});
