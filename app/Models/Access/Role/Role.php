<?php

namespace App\Models\Access\Role;

use App\Models\Model\Model;
use App\Models\Access\Role\Traits\Relationship\RolePermissionRelationship;
use App\Models\Access\Role\Traits\Relationship\RoleUserRelationship;
class Role extends Model
{
    use RolePermissionRelationship, RoleUserRelationship;
	/**
	 * Table Name
	 * @var string
	 */
    protected $table = "roles";
}
