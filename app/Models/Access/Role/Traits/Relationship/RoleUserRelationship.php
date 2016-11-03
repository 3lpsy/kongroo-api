<?php

namespace App\Models\Access\Role\Traits\Relationship;

trait RoleUserRelationship
{
    public function users()
    {
        return $this->belongsToMany(config('models.user.namespace'), 'role_user', 'role_id', 'user_id');
    }
}