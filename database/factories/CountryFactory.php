<?php

// random
$factory->define(config('models.country.namespace'), function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\en_US\Address($faker));
    return [
        'name' => $name = $faker->country,
        'code' => substr($name, 0, 2),
        'abbreviation' => substr($name, 0, 4),
        'calling_prefix' => rand(0, 1)
    ];
});

//default
$factory->defineAs(config('models.country.namespace'), 'default', function (Faker\Generator $faker) {
    return [
        'name' => "United States of America",
        'official_name' => "United States of America",
        'local_name' => "United States of America",
        'code' => "US",
        'local_code' => "US",
        'abbreviation' => "USA",
        'local_abbreviation' => "USA",
        'calling_code' => "1",
        'calling_prefix' => "011"
    ];
});

//specific
$factory->defineAs(config('models.country.namespace'), 'america', function (Faker\Generator $faker) {
    return [
        'name' => "United States of America",
        'official_name' => "United States of America",
        'local_name' => "United States of America",
        'code' => "US",
        'local_code' => "US",
        'abbreviation' => "USA",
        'local_abbreviation' => "USA",
        'calling_code' => "1",
        'calling_prefix' => "011"
    ];
});

$factory->defineAs(config('models.country.namespace'), 'canada', function (Faker\Generator $faker) {
    return [
        'name' => "Canada",
        'official_name' => "Canada",
        'local_name' => "Canada",
        'code' => "CA",
        'local_code' => "CA",
        'abbreviation' => "Canada",
        'local_abbreviation' => "Canada",
        'calling_code' => "1",
        'calling_prefix' => "011"
    ];
});

$factory->defineAs(config('models.country.namespace'), 'mexico', function (Faker\Generator $faker) {
    return [
        'name' => "Mexico",
        'official_name' => "United Mexican States",
        'local_name' => "Estados Unidos Mexicanos",
        'code' => "MX",
        'local_code' => "MX",
        'abbreviation' => "Mexico",
        'local_abbreviation' => "Mexico",
        'calling_code' => "52",
        'calling_prefix' => "00"
    ];
});
