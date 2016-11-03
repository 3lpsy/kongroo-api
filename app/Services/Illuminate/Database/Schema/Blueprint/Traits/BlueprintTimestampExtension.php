<?php

namespace App\Services\Illuminate\Database\Schema\Blueprint\Traits;

trait BlueprintTimestampExtension
{
    public function stamps()
    {
        collect(config("blueprint.track.timestamps"))->each(function ($timestamp) {
            $this->timestamp($this->getStampColumn($timestamp))->nullable();
        });
    }

    public function getStampColumn($column)
    {
        return $column . "_at";
    }
}
