<?php


$factory->define(config('models.phone_type.namespace'), function (Faker\Generator $faker) {
    return [
        'name' => 'cell',
        'display_name' => "Cell Phone",
        'slug' => str_slug('cell-phone'),
    ];
});

$factory->defineAs(config('models.phone_type.namespace'), 'cell', function (Faker\Generator $faker) {
    return [
        'name' => 'cell',
        'display_name' => "Cell Phone",
        'slug' => str_slug('cell-phone'),
    ];
});
