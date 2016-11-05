<?php

namespace App\Models\Access\LoginToken;

use App\Models\Model\Model;

use App\Models\Access\LoginToken\Traits\LoginTokenUserRelationship;
use App\Models\Access\LoginToken\Traits\LoginTokenAuthHelpers;

class LoginToken extends Model
{
    use LoginTokentAuthHelpers,
        LoginTokenUserRelationship;

    public $model = "login_token";

    public $incrementing = false;

    public function getRouteKeyName()
    {
        return 'token';
    }

    public function getKeyName()
    {
        return 'token';
    }


}
