<?php


$factory->define(config('models.role.namespace'), function (Faker\Generator $faker) {
    return [
        'name' => $name = $faker->word,
        'display_name' => ucfirst($name),
        'description' => $faker->sentence,
        'slug' => $faker->slug,
    ];
});

$factory->defineAs(config('models.role.namespace'), 'default', function (Faker\Generator $faker) {
    return [
        'name' => $name = $faker->word,
        'display_name' => ucfirst($name),
        'description' => $faker->sentence,
        'slug' => $faker->slug,
    ];
});

$factory->defineAs(config('models.role.namespace'), 'super', function (Faker\Generator $faker) {
    return [
        'name' => "super",
        'display_name' => "Admin",
        'description' => "All Privledges and Permissions",
        'slug' => $faker->slug,
    ];
});

$factory->defineAs(config('models.role.namespace'), 'partner', function (Faker\Generator $faker) {
    return [
        'name' => "partner",
        'display_name' => "Contributing Partner",
        'description' => "Contributes Content",
        'slug' => $faker->slug,
    ];
});

$factory->defineAs(config('models.role.namespace'), 'moderator', function (Faker\Generator $faker) {
    return [
        'name' => "moderator",
        'display_name' => "Moderator",
        'description' => "Disables and Reports Content",
        'slug' => $faker->slug,
    ];
});

$factory->defineAs(config('models.role.namespace'), 'regular', function (Faker\Generator $faker) {
    return [
        'name' => 'regular',
        'display_name' => 'User',
        'description' => "Regular User",
        'slug' => $faker->slug,
    ];
});

$factory->defineAs(config('models.role.namespace'), 'super-bot', function (Faker\Generator $faker) {
    return [
        'name' => 'super-bot',
        'display_name' => 'Maintainence Bot Admin',
        'description' => "Beep. Bop. I Am Your Overlord",
        'slug' => $faker->slug,
    ];
});
