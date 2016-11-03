<?php


$factory->define(config('models.phoneType.class'), function (Faker\Generator $faker) {
    return [
        'name' => 'cell',
        'display_name' => "Cell Phone",
        'slug' => slugify('cell-phone'),
    ];
});

$factory->defineAs(config('models.phoneType.class'), 'cell', function (Faker\Generator $faker) {
    return [
        'name' => 'cell',
        'display_name' => "Cell Phone",
        'slug' => slugify('cell-phone'),
    ];
});

