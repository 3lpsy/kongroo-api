<?php

namespace App\Models\Access\User;

use App\Models\Model\Model;

use App\Models\Access\User\Traits\UserAccess;
use App\Models\Access\User\Traits\UserRelationship;
use App\Models\Access\User\Traits\UserRoleRelationship;
use App\Models\Access\User\Traits\UserPhoneRelationship;
use App\Models\Access\User\Traits\UserUserSettingsRelationship;
use App\Models\Access\User\Traits\UserQueryBy;

class User extends Model
{
    use UserRelationship,
        UserAccess,
        UserRoleRelationship,
        UserUserSettingsRelationship,
        UserPhoneRelationship,
        UserQueryBy;
        
    /**
     * Table Name
     * @var string
     */
    protected $model = "user";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];




}
