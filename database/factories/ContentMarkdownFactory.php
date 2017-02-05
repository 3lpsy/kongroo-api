<?php

$factory->define(config('models.content_markdown.namespace'), function (Faker\Generator $faker) {
    return [
        'provider' => 'local',
        'markdown_id' => function() {
            return factory(config("models.markdown.namespace"))->create()->first()->id;
        }
    ];
});
