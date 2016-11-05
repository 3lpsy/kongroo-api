<?php

namespace App\Models\Phone\Type;

use App\Models\Model\Model;

class PhoneType extends Model
{
    protected $model = "phone_type";

    public static function byName($name)
    {
        return static::where('name', $name)->firstOrFail();
    }
}
