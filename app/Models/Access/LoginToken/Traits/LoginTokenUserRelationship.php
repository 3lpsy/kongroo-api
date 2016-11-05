<?php

namespace App\Models\Access\LoginToken\Traits;

trait LoginTokenUserRelationship
{
    public function user() {
        return $this->belongsTo(config('models.user.namespace'));
    }

}
