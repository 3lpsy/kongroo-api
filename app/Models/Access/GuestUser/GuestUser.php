<?php

namespace App\Models\Access\GuestUser;

use App\Models\Access\User\User;
use App\Models\Interfaces\Access\AuthUser\AuthUserInterface;


class GuestUser extends User implements AuthUserInterface
{

    use Authenticatable,
        Authorizable;

    public $model = "guest_user";



}
