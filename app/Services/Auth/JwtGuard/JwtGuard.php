<?php

namespace App\Services\Auth\JwtGuard;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Tymon\JWTAuth\JWTAuth;

class JwtGuard implements Guard
{

    protected $user;

    protected $login;

    public function __construct(UserProvider $provider)
    {
        $this->provider = $provider;
    }
    /**
     * Determine if the current user is authenticated.
     *
     * @return bool
     */
    public function check()
    {

    }

    /**
     * Determine if the current user is a guest.
     *
     * @return bool
     */
    public function guest()
    {

    }

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {

    }

    /**
     * Get the ID for the currently authenticated user.
     *
     * @return int|null
     */
    public function id()
    {

    }

    /**
     * Validate a user's credentials.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validate(array $credentials = [])
    {

    }

    /**
     * Set the current user.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    public function setUser(Authenticatable $user)
    {

        $this->user = $user;

        $this->loggedOut = false;

        return $this;

    }


}
