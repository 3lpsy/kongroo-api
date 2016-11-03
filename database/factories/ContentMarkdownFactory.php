<?php

$factory->define(config('models.contentMarkdown.class'), function (Faker\Generator $faker) {
    return [
        'provider' => 'local',
        'markdown_id' => function() {
            return factory(config("models.markdown.class"))->create()->id;
        }
    ];
});
