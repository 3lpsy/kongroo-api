<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Eloquent\Article\ArticleRepositoryInterface',
            'App\Repositories\Eloquent\Article\ArticleRepository'
        );

        $this->app->bind(
            'App\Repositories\Eloquent\Tag\TagRepositoryInterface',
            'App\Repositories\Eloquent\Tag\TagRepository'
        );
    }
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
    }
}