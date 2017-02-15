<?php

namespace App\Entities\Token;

class RequiredTokens
{
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function required()
    {
        return [
            [
                'method' => 'credential',
                'provider' => 'local'
            ],
            [
                'method' => 'email',
                'provider' => 'local'
            ],
            [
                'method' => 'sms',
                'provider' => 'twilio'
            ]
        ];
    }
}
