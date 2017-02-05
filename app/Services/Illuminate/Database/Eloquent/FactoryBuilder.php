<?php

namespace App\Services\Illuminate\Database\Eloquent;

use Illuminate\Database\Eloquent\FactoryBuilder as IlluminateFactoryBuilder;
use Illuminate\Database\Eloquent\Model;
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

         if ($results instanceof Model) {
             $results->save();
         } else {
             $results->each->save();
         }

         return $results;
     }


}
