<?php

// random
$factory->define(config('models.status.namespace'), function (Faker\Generator $faker) {
    return [
        'name' => $name = $faker->word,
        'display_name' => ucfirst($name),
        'description' => $faker->sentence
    ];
});

//default
$factory->defineAs(config('models.status.namespace'), 'default', function (Faker\Generator $faker) {
    return [
        'name' => "active",
        'display_name' => "Active",
        'description' => "Active"
    ];
});

//specific
$factory->defineAs(config('models.status.namespace'), 'active', function (Faker\Generator $faker) {
    return [
        'name' => "active",
        'display_name' => "Active",
        'description' => "Active"
    ];
});

$factory->defineAs(config('models.status.namespace'), 'private', function (Faker\Generator $faker) {
    return [
        'name' => "private",
        'display_name' => "private",
        'description' => "Only Accessbile By Owner and Admin"
    ];
});

$factory->defineAs(config('models.status.namespace'), 'disabled', function (Faker\Generator $faker) {
    return [
        'name' => "disabled",
        'display_name' => "Disabled",
        'description' => "Only Accessbile By Admin"
    ];
});

$factory->defineAs(config('models.status.namespace'), 'banned', function (Faker\Generator $faker) {
    return [
        'name' => "banned",
        'display_name' => "Banned",
        'description' => "Not Accessible and only Stored for Future Filtering"
    ];
});

$factory->defineAs(config('models.status.namespace'), 'junk', function (Faker\Generator $faker) {
    return [
        'name' => "junk",
        'display_name' => "Junk",
        'description' => "Not Accessbile and Targeted for Deletion"
    ];
});

$factory->defineAs(config('models.status.namespace'), 'pending', function (Faker\Generator $faker) {
    return [
        'name' => "pending",
        'display_name' => "pending",
        'description' => "Only Accessible to Admin and Requires Approval"
    ];
});