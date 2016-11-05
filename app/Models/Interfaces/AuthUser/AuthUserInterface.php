<?php

namespace App\Models\Interfaces\AuthUser;

use App\Models\Interfaces\User\UserInterface;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

interface AuthUserInterface extends AuthenticatableContract, AuthorizableContract, UserInterface
{

}
