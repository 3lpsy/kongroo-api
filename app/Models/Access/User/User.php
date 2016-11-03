<?php

namespace App\Models\Access\User;

use App\Models\Model\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use App\Models\Access\User\Traits\Relationship\UserRelationship;
use App\Models\Access\User\Traits\Relationship\UserRoleRelationship;
use App\Models\Access\User\Traits\Relationship\UserAccess;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
class User extends Model implements AuthenticatableContract
{
    use Authenticatable, UserRelationship, UserRoleRelationship,
        UserAccess, SoftDeletes, HasApiTokens;
    /**
     * Table Name
     * @var string
     */
    protected $table = "users";

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

    public static function byEmail($email)
    {
        return static::where('email', $email)->firstOrFail();
    }

    public function savePhone($phone)
    {
        $this->phone()->save($phone);
        return $this->save();
    }

    public function saveSettings($settings)
    {
        return $this->update(['settings_id' => $settings->id]);
    }



}
