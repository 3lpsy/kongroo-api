<?php


$factory->define(config('models.phone.namespace'), function (Faker\Generator $faker) {
    return [
        'number' => '555-555-5555',
        'extension' => null
    ];
});

$factory->defineAs(config('models.phone.namespace'), 'default', function (Faker\Generator $faker) {
    return [
        'number' => '555-555-5555',
        'extension' => null
    ];
});
