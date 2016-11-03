<?php

namespace App\Models\Status;

use App\Models\Model\Model;

class Status extends Model
{    /**
     * Table Name
     * @var string
     */
    protected $table = 'statuses';

    public static function byName($name) {
        return static::where('name', $name)->firstOrFail();
    }
}
