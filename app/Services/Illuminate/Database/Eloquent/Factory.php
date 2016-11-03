<?php

namespace App\Services\Illuminate\Database\Eloquent;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use App\Services\Illuminate\Database\Eloquent\FactoryBuilder;

class Factory extends EloquentFactory {

    /**
     * Create a builder for the given model.
     *
     * @param  string  $class
     * @param  string  $name
     * @return \Illuminate\Database\Eloquent\FactoryBuilder
 */

    public function of($class, $name = 'default')
    {
        return new FactoryBuilder($class, $name, $this->definitions, $this->states, $this->faker);
    }

}