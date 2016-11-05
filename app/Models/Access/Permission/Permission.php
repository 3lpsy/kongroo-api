<?php

namespace App\Models\Access\Permission;

use App\Models\Model\Model;
use App\Models\Access\Permission\Traits\PermissionRelationship;
use App\Models\Access\Permission\Traits\PermissionRoleRelationship;

class Permission extends Model
{
    use PermissionRelationship, PermissionRoleRelationship;
    /**
     * Table Name
     * @var string
     */
    protected $model = "permission";
}
