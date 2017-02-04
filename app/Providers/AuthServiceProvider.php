<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Services\Auth\JwtGuard\JwtGuard;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        app('auth')->extend('jwt', function ($app, $name, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\Guard...
            return new JwtGuard($this->app['tymon.jwt.manager']);
        });
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAuthenticator();

        $this->registerUserResolver();

        $this->registerRequestRebindHandler();
    }

    /**
     * Register the authenticator services.
     *
     * @return void
     */
    protected function registerAuthenticator()
    {
        $this->app->singleton('auth', function ($app) {
            // Once the authentication service has actually been requested by the developer
            // we will set a variable in the application indicating such. This helps us
            // know that we need to set any queued cookies in the after event later.
            $app['auth.loaded'] = true;

            return new AuthManager($app);
        });

        $this->app->singleton('auth.driver', function ($app) {
            return $app['auth']->guard();
        });
    }

    /**
     * Register a resolver for the authenticated user.
     *
     * @return void
     */
    protected function registerUserResolver()
    {
        $this->app->bind(
            AuthenticatableContract::class, function ($app) {
                return call_user_func($app['auth']->userResolver());
            }
        );
    }

    /**
     * Register a resolver for the authenticated user.
     *
     * @return void
     */
    protected function registerRequestRebindHandler()
    {
        $this->app->rebinding('request', function ($app, $request) {
            $request->setUserResolver(function ($guard = null) use ($app) {
                return call_user_func($app['auth']->userResolver(), $guard);
            });
        });
    }
}
