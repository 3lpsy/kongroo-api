<?php

namespace App\Models\Access\Permission\Traits\Relationship;

trait PermissionRoleRelationship
{
    public function roles()
    {
        return $this->belongsToMany(config('models.permission.namespace'), 'permission_role', 'permission_id', 'role_id');
    }
}