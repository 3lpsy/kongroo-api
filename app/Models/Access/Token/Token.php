<?php

namespace App\Models\Access\Token;

use App\Models\Model\Model;

use App\Models\Access\Token\Traits\TokenUserRelationship;
use App\Models\Access\Token\Traits\TokenAuthHelpers;

class Token extends Model
{
    use TokenAuthHelpers,
        TokenUserRelationship;

    public $model = "token";

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
