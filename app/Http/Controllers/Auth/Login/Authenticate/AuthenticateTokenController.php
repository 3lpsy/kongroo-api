<?php

namespace App\Http\Controllers\Auth\Login\Authenticate;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Auth\Login\LoginController;

use App\Http\Controllers\Controller;
use App\Models\Access\User\User;
use App\Jobs\Auth\SendAuthEmailToUser;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthenticateTokenController extends LoginController
{

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oldToken = $this->jwt->getToken();
        try {
            $user = $this->resolveUserFromToken();
        } catch (ModelNotFoundException $e) {
            return $this->onBadRequest();
        }

        $token = $this->makeNewAuthenticatedTokenForUser($user);

        return $this->onGoodRequest($token);
    }
}
