<?php

$factory->define(config('models.image.namespace'), function (Faker\Generator $faker) {
    return [
        'protocol' => 'http',
        'hostname' => 'api.kongroo.dev',
        'directory' => "",
        'filename' => 'random-string@640x360.jpg',
        'resolution' => '640x360',
        'original_filename' => 'big-bunny-post.jpg',
        'mime' => 'image/jpeg'
    ];
});
