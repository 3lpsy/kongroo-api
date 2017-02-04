<?php

$factory->define(config('models.video.namespace'), function (Faker\Generator $faker) {
    return [
        'title' => 'Big Bunny Video',
        'description' => 'Sample Video Granted For Public Use',
        'poster_id' => factory(config('models.image.namespace'))->create()->id
    ];
});
