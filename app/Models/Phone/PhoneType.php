<?php

namespace App\Models\Phone;

use App\Models\Model\Model;

class PhoneType extends Model
{
    protected $table = "phone_types";

    public static function byName($name)
    {
        return static::where('name', $name)->firstOrFail();
    }
}
