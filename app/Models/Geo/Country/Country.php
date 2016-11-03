<?php

namespace App\Models\Geo\Country;

use App\Models\Model\Model;

class Country extends Model
{
    public $table = "countries";

    public static function byCode($code) {
        return static::where('code', $code)->firstOrFail();
    }
}
