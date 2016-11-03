<?php

namespace App\Application;

use Laravel\Lumen\Application as LumenApplication;

class Application extends LumenApplication
{
    public function prepareForConsoleCommand($aliases = true)
    {
        $this->withFacades($aliases);

        $this->make('cache');
        $this->make('queue');

        $this->configure('database');

        $this->register('App\Providers\MigrationServiceProvider');
        $this->register('Illuminate\Database\SeedServiceProvider');
        $this->register('Illuminate\Queue\ConsoleServiceProvider');
    }
}
