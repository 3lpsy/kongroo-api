<?php

namespace App\Models\Access\Role;

use App\Models\Model\Model;
use App\Models\Access\Role\Traits\RolePermissionRelationship;
use App\Models\Access\Role\Traits\RoleUserRelationship;

class Role extends Model
{
    use RolePermissionRelationship, RoleUserRelationship;
    /**
     * Table Name
     * @var string
     */
    protected $model = "role";
}
