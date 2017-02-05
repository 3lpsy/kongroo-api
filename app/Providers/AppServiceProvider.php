<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Access\User\User;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        User::macro('seed', function($user) {
            dd('mac');
        });
    }
}
