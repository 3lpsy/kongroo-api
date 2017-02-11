<?php

namespace App\Models\Access\Token\Traits;

use App\Models\Access\User\User;

trait TokenAuthHelpers
{
    public function isValid()
    {
        return $this->expires_at > \Carbon\Carbon::now() && $this->user() && $this->statusIs("active");
    }

    public static function generateFor(User $user, $statusId = 1)
    {
        static::invalidateFor($user):
        $token = new static;
        $token->user_id = $user->id;
        $token->status_id = $statusId;
        $token->token = str_random(60);
        $token->expires_at = \Carbon\Carbon::now()->addMinutes(61);
        $token->save();
        return $token;
    }

    public static function invalidateFor(User $user)
    {
        static::where('user_id', $user->id)->where('status_id', '!=', 1)->update([
            'status_id' => 0
        ]);
    }
}
}
