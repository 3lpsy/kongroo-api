<?php

// random
$factory->define(config('models.status.class'), function (Faker\Generator $faker) {
    return [
        'name' => $name = $faker->word,
        'display_name' => ucfirst($name),
        'description' => $faker->sentence
    ];
});

//default
$factory->defineAs(config('models.status.class'), 'default', function (Faker\Generator $faker) {
    return [
        'name' => "active",
        'display_name' => "Active",
        'description' => "Active"
    ];
});

//specific
$factory->defineAs(config('models.status.class'), 'active', function (Faker\Generator $faker) {
    return [
        'name' => "active",
        'display_name' => "Active",
        'description' => "Active"
    ];
});

$factory->defineAs(config('models.status.class'), 'private', function (Faker\Generator $faker) {
    return [
        'name' => "private",
        'display_name' => "private",
        'description' => "Only Accessbile By Owner and Admin"
    ];
});

$factory->defineAs(config('models.status.class'), 'disabled', function (Faker\Generator $faker) {
    return [
        'name' => "disabled",
        'display_name' => "Disabled",
        'description' => "Only Accessbile By Admin"
    ];
});

$factory->defineAs(config('models.status.class'), 'banned', function (Faker\Generator $faker) {
    return [
        'name' => "banned",
        'display_name' => "Banned",
        'description' => "Not Accessible and only Stored for Future Filtering"
    ];
});

$factory->defineAs(config('models.status.class'), 'junk', function (Faker\Generator $faker) {
    return [
        'name' => "junk",
        'display_name' => "Junk",
        'description' => "Not Accessbile and Targeted for Deletion"
    ];
});

$factory->defineAs(config('models.status.class'), 'pending', function (Faker\Generator $faker) {
    return [
        'name' => "pending",
        'display_name' => "pending",
        'description' => "Only Accessible to Admin and Requires Approval"
    ];
});