<?php

$factory->define(config('models.markdown.namespace'), function (Faker\Generator $faker) {
    $faker->addProvider(new \DavidBadura\FakerMarkdownGenerator\FakerProvider($faker));
    return [
        'body' => $faker->markdown()
    ];
});
