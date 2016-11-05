<?php

$factory->define(config('models.user_settings.namespace'), function (Faker\Generator $faker) {
    return [
        "email_authentication" => 1,
        "phone_authentication" => 1,
        "two_factor_authentication" => 1,
        'slug' => $faker->slug,
    ];
});
