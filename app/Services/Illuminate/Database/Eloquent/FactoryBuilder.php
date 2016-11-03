<?php

namespace App\Services\Illuminate\Database\Eloquent;

use Illuminate\Database\Eloquent\FactoryBuilder as IlluminateFactoryBuilder;

class FactoryBuilder extends IlluminateFactoryBuilder {
    /**
     * Create a collection of models and persist them to the database.
     *
     * @param  array  $attributes
     * @return mixed
     */
    public function create(array $attributes = [])
    {
        $results = $this->make($attributes);
        if ($this->amount === 1) {
            $results->seed();
        } else {
            foreach ($results as $result) {
                $result->seed();
            }
        }
        return $results;
    }


}