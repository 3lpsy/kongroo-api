<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class MorphMapServiceProvider extends ServiceProvider
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
        Relation::morphMap([
            'content_markdown' => config('models.content_markdown.namespace')
        ]);

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
