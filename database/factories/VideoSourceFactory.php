<?php

$factory->define(config('models.video_source.namespace'), function (Faker\Generator $faker) {
    return [
        'protocol' => 'http',
        'hostname' => 'api.kongroo.dev',
        'directory' => "",
        'filename' => 'random-string@320x180.mp4',
        'resolution' => '320x180',
        'original_filename' => 'BigBuckBunny@320x180.mp4',
        'mime' => 'video/mp4'
    ];
});


$factory->defineAs(config('models.video_source.namespace'), 'mp4', function (Faker\Generator $faker) {
    return [
        'protocol' => 'http',
        'hostname' => 'api.kongroo.dev',
        'directory' => "",
        'filename' => 'random-string@320x180.mp4',
        'resolution' => '320x180',
        'original_filename' => 'BigBuckBunny@320x180.mp4',
        'mime' => 'video/mp4'
    ];
});

$factory->defineAs(config('models.video_source.namespace'), 'webm', function (Faker\Generator $faker) {
    return [
        'protocol' => 'http',
        'hostname' => 'api.kongroo.dev',
        'directory' => "",
        'filename' => 'random-string@480p.webm',
        'resolution' => '320x180',
        'original_filename' => 'BigBuckBunny-480.webm',
        'mime' => 'video/webm'
    ];
});

$factory->defineAs(config('models.video_source.namespace'), 'avi', function (Faker\Generator $faker) {
    return [
        'protocol' => 'http',
        'hostname' => 'api.kongroo.dev',
        'directory' => "",
        'filename' => 'random-string-2@480p.avi',
        'resolution' => '480p',
        'original_filename' => 'big_buck_bunny_480p_surround.avi',
        'mime' => 'video/x-msvideo'
    ];
});
