<?php

namespace App\Http\Controllers\Auth\Login;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Access\User\User;
use App\Jobs\Auth\SendAuthEmailToUser;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class LoginController extends Controller
{
    protected $jwt;

    public function __construct()
    {
        $this->jwt = app('tymon.jwt.auth');
    }

    protected function resolveUserFromToken()
    {
        $oldToken = $this->jwt->getToken();
        return User::byEmail($this->jwt->toUser($oldToken)->email);
    }

    protected function makeNewAuthenticatedTokenForUser($user)
    {
        $claims = $this->makeNewAuthenticatedClaimsForUser($user);

        $newToken = $this->jwt->fromUser($user, $claims);

        $this->jwt->invalidate($this->jwt->getToken());

        return $newToken;
    }

    protected function makeNewAuthenticatedClaimsForUser($user)
    {
        $payload = $this->jwt->parseToken()->getPayload();

        $claims = [];

        $claims['factors'] = $this->getAllUserFactors($user);

        if ($claims['factors'] === $payload['verified']) {
            $claims["authenticated"] = true;
            return $claims;
        }

        throw new \Exception('Unverified');
    }


    protected function makeNewVerifiedTokenForUser($user, $verified)
    {
        $claims = $this->makeNewVerifiedClaimsForUser($user, $verified);

        $newToken = $this->jwt->fromUser($user, $claims);

        $this->jwt->invalidate($this->jwt->getToken());

        return $newToken;
    }

    protected function makeNewVerifiedClaimsForUser($user, $verified)
    {
        $payload = $this->jwt->parseToken()->getPayload();

        $claims = [];

        $claims['factors'] = $this->getAllUserFactors($user);

        $claims["authenticated"] = false;

        $claims['verified'] = array_merge($payload['verified'], $verified);

        return $claims;
    }

    protected function getAllUserFactors($user)
    {
        return ['credential', 'email', 'sms'];
    }

    protected function getFirstFactorForUser($user)
    {
        return 'credential';
    }

    /**
     * What response should be returned on good request.
     *
     * @return JsonResponse
     */
    protected function onGoodRequest($token)
    {
        // errors => [bagName => [fieldname' => messages]]
        return new JsonResponse([
            'token' => $token
        ], 200);
    }
    /**
     * What response should be returned on bad request.
     *
     * @return JsonResponse
     */
    protected function onBadRequest()
    {
        // errors => [bagName => [fieldname' => messages]]
        return new JsonResponse([
            'meta' => [
                'errors' => [
                    'auth' =>
                        [
                            'message' => 'Invalid Credentials',
                            'title' => "Error!",
                            'code' => 'auth_failure',
                            'display' => true,
                            'field' => 'general',
                            'bag' => 'auth'
                        ]
                    ]
            ]
        ], Response::HTTP_UNAUTHORIZED);
    }
}
