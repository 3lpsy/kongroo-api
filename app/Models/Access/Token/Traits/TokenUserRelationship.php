<?php

namespace App\Models\Access\Token\Traits;

trait TokenUserRelationship
{
    public function user()
    {
        return $this->belongsTo(config('models.user.namespace'));
    }
}
