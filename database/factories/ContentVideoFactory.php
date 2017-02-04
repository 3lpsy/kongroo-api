<?php

$factory->define(config('models.content_video.namespace'), function (Faker\Generator $faker) {
    return [
        'video_id' => function () {
            return factory(config("models.video.namespace"))->create()->id;
        }
    ];
});
