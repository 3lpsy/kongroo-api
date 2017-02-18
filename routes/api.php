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
    $app->get('/tag/{tagId}', [
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

$app->group(['prefix' => 'v1'], function () use ($app) {
    $app->get('/test', [
        'uses' => 'Auth\Login\Password\PasswordTokenController@store',
        'as' => 'test'
    ]);
});

$app->group(['prefix' => 'v1'], function () use ($app) {
    $app->post('/auth/login/start', [
        'uses' => 'Auth\Login\Start\StartLoginController@store',
        'as' => 'api.auth.login.start-login.store'
    ]);
});

$app->group(['prefix' => 'v1'], function () use ($app) {
    $app->post('/auth/login/password', [
        'uses' => 'Auth\Login\Password\PasswordTokenController@store',
        'as' => 'api.auth.login.password.store'
    ]);

    $app->post('/auth/login/email', [
        'uses' => 'Auth\Login\Email\EmailTokenController@store',
        'as' => 'api.auth.login.email.store'
    ]);

    $app->post('/auth/login/sms', [
        'uses' => 'Auth\Login\SMS\SMSTokenController@store',
        'as' => 'api.auth.login.sms.store'
    ]);

    $app->post('/auth/login/authenticate', [
        'uses' => 'Auth\Login\Authenticate\AuthenticateTokenController@store',
        'as' => 'api.auth.login.authenticate.store'
    ]);
});

$app->group(['prefix' => 'v1/admin'], function () use ($app) {
    $app->get('/dt/article', [
        'uses' => 'Admin\DT\Article\ArticleController@index',
        'as' => 'api.dt.admin.article.index'
    ]);
    $app->get('/article', [
        'uses' => 'Admin\Article\ArticleController@index',
        'as' => 'api.admin.article.index'
    ]);
    $app->get('/article/{articleId}', [
        'uses' => 'Admin\Article\ArticleController@show',
        'as' => 'api.admin.article.show'
    ]);
    $app->get('/tag', [
        'uses' => 'Admin\Tag\TagController@index',
        'as' => 'api.admin.tag.index'
    ]);
    $app->get('/tag/{tagId}', [
        'uses' => 'Admin\Tag\TagController@show',
        'as' => 'api.admin.tag.show'
    ]);

    $app->get('/category', [
        'uses' => 'Admin\Category\CategoryController@index',
        'as' => 'api.admin.category.index'
    ]);
    $app->get('/category/{categoryId}', [
        'uses' => 'Admin\Category\CategoryController@show',
        'as' => 'api.admin.category.show'
    ]);

    $app->get('/series', [
        'uses' => 'Admin\Series\SeriesController@index',
        'as' => 'api.admin.series.index'
    ]);
    $app->get('/seriesId/{seriesId}', [
        'uses' => 'Admin\Series\SeriesController@show',
        'as' => 'api.admin.series.show'
    ]);
});
