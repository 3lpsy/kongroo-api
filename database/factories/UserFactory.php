<?php


$factory->define(config('models.user.class'), function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'slug' => randSlug()
    ];
});

$factory->defineAs(config('models.user.class'), 'default', function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'slug' => randSlug()
    ];
});

$factory->defineAs(config('models.user.class'), 'super', function (Faker\Generator $faker) {
    return [
        'first_name' => env("APP_SUPER_USER_FIRST_NAME"),
        'middle_name' => $faker->firstName,
        'last_name' => env("APP_SUPER_USER_LAST_NAME"),
        'email' => env("APP_SUPER_USER_EMAIL"),
        'slug' => randSlug()
    ];
});

$factory->defineAs(config('models.user.class'), 'super-bot', function (Faker\Generator $faker) {
    return [
        'first_name' => env("APP_SUPER_BOT_FIRST_NAME"),
        'middle_name' => $faker->firstName,
        'last_name' => env("APP_SUPER_BOT_LAST_NAME"),
        'email' => env("APP_SUPER_BOT_EMAIL"),
        'slug' => randSlug()
    ];
});