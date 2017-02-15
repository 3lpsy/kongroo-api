<?php

namespace App\Http\Controllers\Auth\Login\Start;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Models\Access\User\User;
use App\Jobs\Auth\SendAuthEmailToUser;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Controllers\Auth\Login\LoginController;

class StartLoginController extends LoginController
{

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateLoginRequest($request);

        try {
            $user = $this->resolveUserFromRequest($request);
        } catch (ModelNotFoundException $e) {
            // returns fake token group
            return $this->onBadRequest();
        }

        $token = $this->jwt->fromUser($user, [
            'factors' => [$this->getFirstFactorForUser($user)],
            'verified' => []
        ]);

        return $this->onGoodRequest($token);
    }

    protected function resolveUserFromRequest($request)
    {
        return User::byEmail($request->input('email', false));
    }

    /**
     * Validate authentication request.
     *
     * @param  Request $request
     * @return void
     * @throws HttpResponseException
     */
    protected function validateLoginRequest(Request $request)
    {
        $rules = ['email' => 'required|email|max:255|exists:users,email'];

        $credentials = $request->only(['email']);

        $validator = $this->getValidationFactory()
            ->make($credentials, $rules, [], []);

        if ($validator->fails()) {
            $this->onBadRequest();
        }
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
            'token' => $token,
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
        ], Response::HTTP_UNAUTHORIZED);
    }
}
