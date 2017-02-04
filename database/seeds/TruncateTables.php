<?php

use Illuminate\Database\Seeder;

class TruncateTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $models = config('models');

        collect($models)->each(function ($model, $modelOrKey) {
            if (! array_key_exists("truncate", $model) || $model["truncate"] === false) {
                \DB::table($model["table"])->truncate();
            }
        });
    }
}
