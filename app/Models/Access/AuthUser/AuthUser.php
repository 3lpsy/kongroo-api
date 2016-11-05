<?php

namespace App\Models\Access\AuthUser;

use App\Models\Access\User\User;
use App\Models\Interfaces\AuthUser\AuthUserInterface;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Laravel\Lumen\Auth\Authorizable;


class AuthUser extends User implements AuthUserInterface
{

    use Authenticatable,
        Authorizable,
        Authorizable;

    public $model = "auth_user";

    public static function seeder()
    {
        return static::where('email', env('APP_SUPER_BOT_EMAIL'))->first();
    }

}
