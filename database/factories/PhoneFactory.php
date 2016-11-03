<?php


$factory->define(config('models.phone.class'), function (Faker\Generator $faker) {
    return [
        'number' => '555-555-5555',
        'extension' => null
    ];
});

$factory->defineAs(config('models.phone.class'), 'default', function (Faker\Generator $faker) {
    return [
        'number' => '555-555-5555',
        'extension' => null
    ];
});
