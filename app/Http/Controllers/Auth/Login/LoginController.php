<?php

namespace App\Http\Controllers\Auth\Login;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Access\User\User;
use App\Jobs\Auth\SendAuthEmailToUser;
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
        $this->validateLoginRequest($request);

        $user = $this->resolveUser($request);

        $this->dispatchLoginToUser($user);

        return $this->onGoodRequest();
    }

    protected function resolveUser($request)
    {
        return User::byEmail($request->input('email', false));
    }

    protected function dispatchLoginToUser($user)
    {
        $this->dispatch(new SendAuthEmailToUser($user));
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
    protected function onGoodRequest()
    {
        // errors => [bagName => [fieldname' => messages]]
        return new JsonResponse([
            'meta' => [
                'messages' => [
                    'auth' => [
                        'general' => [
                            'text' => 'Please check inbox for instructions.',
                            'code' => 'auth_email_sent',
                            'display' => true
                        ]
                    ]
                ]
            ]
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
                    'auth' => [
                        'general' => [
                            'text' => 'Invalid Credentials',
                            'code' => 'auth_failure',
                            'display' => true
                        ]
                    ]
                ]
            ]
        ], Response::HTTP_UNAUTHORIZED);
    }
}
