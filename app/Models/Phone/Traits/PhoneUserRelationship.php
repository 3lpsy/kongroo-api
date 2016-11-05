<?php

namespace App\Models\Phone\Traits;

use App\Models\Geo\Country\Country;

trait PhoneUserRelationship
{
    public function user()
    {
        return $this->belongsTo(config("models.user.namespace"), 'user_id');
    }
}
