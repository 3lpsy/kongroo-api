<?php

$factory->define(config('models.appData.class'), function (Faker\Generator $faker) {
    return [
        'name' => "acme",
        "display_name" => "Acme",
        "twitter_username" => "acmetweets",
        "github_username" => "acmetweets",
        "medium_username" => "acmetweets",
    ];
});
