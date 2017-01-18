<?php

$app->group(['prefix' => 'v1'], function() use ($app) {
    $app->get('/article', [
        'uses' => '\App\Http\Controllers\Article\ArticleController@index',
        'as' => 'api.article.index'
    ]);
    $app->get('/article/{article}', [
        'uses' => '\App\Http\Controllers\Article\ArticleController@show',
        'as' => 'api.article.show'
    ]);
});

$app->group(['prefix' => 'v1'], function() use ($app) {
    $app->get('/tag', [
        'uses' => '\App\Http\Controllers\Tag\TagController@index',
        'as' => 'api.tag.index'
    ]);
    $app->get('/tag/{tag}', [
        'uses' => '\App\Http\Controllers\Article\TagController@show',
        'as' => 'api.tag.show'
    ]);
});
