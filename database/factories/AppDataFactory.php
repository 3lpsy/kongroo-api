<?php

$factory->define(config('models.app_data.namespace'), function (Faker\Generator $faker) {
    return [
        'name' => "acme",
        "display_name" => "Acme",
        "twitter_username" => "acmetweets",
        "github_username" => "acmetweets",
        "medium_username" => "acmetweets",
    ];
});
