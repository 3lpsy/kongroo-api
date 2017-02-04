<?php

namespace App\Http\Controllers\Auth\Login;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Exception\HttpResponseException;

class LoginController extends Controller
{

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validateLoginRequest($request);
        } catch (HttpResponseException $e) {
            return $this->onBadRequest();
        }
        try {
            // Attempt to verify the credentials and create a token for the user
            if (!$token = app('auth')->guard('jwt')->validate(
                $this->getCredentials($request)
            )) {
                return $this->onUnauthorized();
            }
        } catch (JWTException $e) {
            // Something went wrong whilst attempting to encode the token
            return $this->onJwtGenerationError();
        }
        // All good so return the token
        return $this->onAuthorized($token);
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
        $rules = ['email' => 'required|email|max:255', 'password' => 'required'];

        $credentials = $request->only(['email', 'password']);

        $validator = $this->getValidationFactory()
            ->make($credentials, $rules, [], []);

        if ($validator->fails()) {
            $this->onBadRequest();
        }
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
            'errors' => ['auth' => ['general' => ['messages' => ['Invalid Credentials']]]]
        ], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * What response should be returned on invalid credentials.
     *
     * @return JsonResponse
     */
    protected function onUnauthorized()
    {
        // errors => [bagName => [fieldname' => messages]]
        return new JsonResponse([
            'errors' => ['auth' => ['general' => ['Invalid Credentials']]]
        ], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * What response should be returned on authorized.
     *
     * @return JsonResponse
     */
    protected function onAuthorized($token)
    {
        return new JsonResponse([
            'data' => [
                'token' => $token,
            ],
            'meta' => ['messages' => ['auth' => ['general' => 'Success! Redirecting.']]]
        ]);
    }

    public function delete()
    {
        $this->invalidateToken();
        return $this->onLogout();
    }

    protected function invalidateToken()
    {
        $token = app('auth')->guard('jwt')->parseToken();
        $token->invalidate();
    }

    protected function onLogout()
    {
        return new JsonResponse([
            'meta' => [
                'messages' => [
                    'auth' => [
                        'general' => "Logged Out!"
                    ]
                ]
            ]
        ]);
    }

    public function update()
    {
        $newToken = $this->refreshedToken();
        return $this->onRefreshed($token);
    }

    protected function refreshToken()
    {
        $token = app('auth')->guard('jwt')->parseToken();
        return $token->refresh();
    }

    protected function onRefreshed($token)
    {
        return new JsonResponse([
            'meta' => [
                'auth' => [
                    'messages' => ['general' => "Logged Out!"]
                ]
            ],
            'data' => [
                'token' => $token
            ]
        ]);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        return $request->only('email', 'password');
    }
}
