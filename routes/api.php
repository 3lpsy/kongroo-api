<?php

$app->group(['prefix' => 'v1'], function () use ($app) {
    $app->get('/article', [
        'uses' => 'Article\ArticleController@index',
        'as' => 'api.article.index'
    ]);
    $app->get('/article/{article}', [
        'uses' => 'Article\ArticleController@show',
        'as' => 'api.article.show'
    ]);
});

$app->group(['prefix' => 'v1'], function () use ($app) {
    $app->get('/tag', [
        'uses' => 'Tag\TagController@index',
        'as' => 'api.tag.index'
    ]);
    $app->get('/tag/{tag}', [
        'uses' => 'Article\TagController@show',
        'as' => 'api.tag.show'
    ]);
});

$app->group(['prefix' => 'v1'], function () use ($app) {
    $app->get('/image/{imageId}', [
        'uses' => 'Image\ImageController@show',
        'as' => 'api.image.show'
    ]);
});


$app->group(['prefix' => 'v1'], function () use ($app) {
    $app->get('/video/{videoId}', [
        'uses' => 'Video\VideoController@show',
        'as' => 'api.video.show'
    ]);
});


$app->group(['prefix' => 'v1'], function () use ($app) {
    $app->get('/video/{videoId}/source/{videoSourceId}', [
        'uses' => 'Video\Source\VideoSourceController@show',
        'as' => 'api.video.video-source.show'
    ]);
});
