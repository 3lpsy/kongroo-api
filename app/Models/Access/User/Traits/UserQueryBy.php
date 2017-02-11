<?php

namespace App\Models\Access\User\Traits;

trait UserQueryBy
{
    public static function byEmail($email)
    {
        return static::where('email', $email)->firstOrFail();
    }
}
