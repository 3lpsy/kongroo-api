<?php

namespace App\Services\Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Str;
use Illuminate\Database\Schema\Blueprint as IlluminateBlueprint;
use App\Services\Illuminate\Database\Schema\Blueprint\Traits\BlueprintForeignExtension;
use App\Services\Illuminate\Database\Schema\Blueprint\Traits\BlueprintSoftDeletesExtension;
use App\Services\Illuminate\Database\Schema\Blueprint\Traits\BlueprintTimestampExtension;
use App\Services\Illuminate\Database\Schema\Blueprint\Traits\BlueprintUserAction;

class Blueprint extends IlluminateBlueprint
{
    use BlueprintForeignExtension,
        BlueprintTimestampExtension,
        BlueprintUserAction;


    public function nomen()
    {
        $this->string("name")->nullable();
        $this->string("display_name")->nullable();
        $this->text('description')->nullable();
    }
    
    public function slug()
    {
        $this->string('slug', 32)->nullable();
    }

    public function stripId($key)
    {
        return Str::replaceLast("_id", '', $key);
    }

    public function appendId($table, $key = "id")
    {
        return "{$table}_{$key}";
    }

    public function tableFromFk($key) 
    {
        return Str::plural($this->stripId($key));
    }

    public function fkFromTable($table) 
    {
        return $this->appendId(Str::singular($table));
    }

}
