<?php

namespace App\Http\Controllers\Auth\Login\SMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\Login\LoginController;
use App\Models\Access\User\User;
use App\Jobs\Auth\SendAuthEmailToUser;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SMSTokenController extends LoginController
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

        $oldToken = $this->jwt->getToken();

        try {
            $user = $this->resolveUserFromToken();
        } catch (ModelNotFoundException $e) {
            return $this->onBadRequest();
        }

        // authenticate code

        $token = $this->makeNewVerifiedTokenForUser($user, ['sms']);

        return $this->onGoodRequest($token);
    }



    protected function dispatchLoginToUser($user)
    {
        // $this->dispatch(new SendAuthEmailToUser($user));
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
        $rules = ['code' => 'required|min:5'];

        $credentials = $request->only(['code']);

        $validator = $this->getValidationFactory()
            ->make($credentials, $rules, [], []);

        if ($validator->fails()) {
            $this->onBadRequest();
        }
    }
}
