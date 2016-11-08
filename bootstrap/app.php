<?php
use App\Providers\AuthServiceProvider;
use App\Providers\MigrationCreatorServiceProvider;

require_once __DIR__.'/../vendor/autoload.php';

try {
    (new Dotenv\Dotenv(__DIR__.'/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new App\Application\Application(
    realpath(__DIR__.'/../')
);

$app->withFacades();

$app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->configure('models');
$app->configure('blueprint');
$app->configure('cors');

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

$app->middleware([
    Nord\Lumen\Cors\CorsMiddleware::class,
]);

// $app->routeMiddleware([
//     'auth' => App\Http\Middleware\Authenticate::class,
// ]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

$app->register(App\Providers\AppServiceProvider::class);
$app->register(App\Providers\AuthServiceProvider::class);
$app->register(App\Providers\MigrationCreatorServiceProvider::class);
$app->register(App\Providers\MigrationServiceProvider::class);
$app->register(App\Providers\MorphMapServiceProvider::class);
$app->register(App\Providers\RepositoryServiceProvider::class);
$app->register(App\Providers\DatabaseServiceProvider::class);
$app->register(\Nord\Lumen\Cors\CorsServiceProvider::class);


// $app->register(Barryvdh\Cors\ServiceProvider::class);

$app->group(['namespace' => '\App\Http\Controllers'], function ($app) {
    require __DIR__.'/../routes/api.php';
});


return $app;
