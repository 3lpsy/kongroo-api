<?php


$factory->define(config('models.role.class'), function (Faker\Generator $faker) {
    return [
        'name' => $name = $faker->word,
        'display_name' => ucfirst($name),
        'description' => $faker->sentence,
        'slug' => randSlug(),
    ];
});

$factory->defineAs(config('models.role.class'), 'default', function (Faker\Generator $faker) {
    return [
        'name' => $name = $faker->word,
        'display_name' => ucfirst($name),
        'description' => $faker->sentence,
        'slug' => randSlug(),
    ];
});

$factory->defineAs(config('models.role.class'), 'super', function (Faker\Generator $faker) {
    return [
        'name' => "super",
        'display_name' => "Admin",
        'description' => "All Privledges and Permissions",
        'slug' => randSlug(),
    ];
});

$factory->defineAs(config('models.role.class'), 'partner', function (Faker\Generator $faker) {
    return [
        'name' => "partner",
        'display_name' => "Contributing Partner",
        'description' => "Contributes Content",
        'slug' => randSlug(),
    ];
});

$factory->defineAs(config('models.role.class'), 'moderator', function (Faker\Generator $faker) {
    return [
        'name' => "moderator",
        'display_name' => "Moderator",
        'description' => "Disables and Reports Content",
        'slug' => randSlug(),
    ];
});

$factory->defineAs(config('models.role.class'), 'regular', function (Faker\Generator $faker) {
    return [
        'name' => 'regular',
        'display_name' => 'User',
        'description' => "Regular User",
        'slug' => randSlug(),
    ];
});

$factory->defineAs(config('models.role.class'), 'super-bot', function (Faker\Generator $faker) {
    return [
        'name' => 'super-bot',
        'display_name' => 'Maintainence Bot Admin',
        'description' => "Beep. Bop. I Am Your Overlord",
        'slug' => randSlug(),
    ];
});
