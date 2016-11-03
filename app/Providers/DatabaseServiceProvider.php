<?php

namespace App\Providers;

use Illuminate\Database\DatabaseServiceProvider as IlluminateDatabaseServiceProvider;
use Illuminate\Database\Eloquent\Factory as IlluminateEloquentFactory;
use App\Services\Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Faker\Factory as FakerFactory;
use Faker\Generator as FakerGenerator;


class DatabaseServiceProvider extends IlluminateDatabaseServiceProvider
{
    /**
     * Register the Eloquent factory instance in the container.
     *
     * @return void
     */
    protected function registerEloquentFactory()
    {
        $this->app->singleton(FakerGenerator::class, function () {
            return FakerFactory::create();
        });

        $this->app->singleton(IlluminateEloquentFactory::class, function ($app) {
            $faker = $app->make(FakerGenerator::class);

            return EloquentFactory::construct($faker, database_path('factories'));
        });
    }

}
