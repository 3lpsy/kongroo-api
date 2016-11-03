<?php

namespace App\Models\Access\LoginToken;

use App\Models\Model\Model;

class LoginToken extends Model
{
    public $table = "login_tokens";

    protected $fillable = ['user_id', 'status_id', 'token', 'expires_at'];

    public $incrementing = false;

    public function __construct() {
        $this->dates[] = 'expires_at';
    }

    public function getRouteKeyName()
    {
        return 'token';
    }

    public function getKeyName()
    {
        return 'token';
    }

    public function user() {
        return $this->belongsTo(config('models.user.namespace'));
    }

    public function send() {
        $url = route('auth.login.token', ['token' => $this->token]);
        \Log::info("Login Token send()");
        $mail = \Mail::raw("<a href='{$url}'>{$url}</a> ", function($message) {
                $message->to($this->user->email)
                ->subject(env("APP_NAME"));
        });
        return $this;
    }

    public function isValid() {
        return $this->expires_at > \Carbon\Carbon::now() && $this->user() && $this->statusIs("active");
    }

    public static function generateFor($user, $statusId = 1)
    {
        \Log::info("Login Token generateFor()");
        // dd($user);
        static::deleteAllIfExists($user->id, 'user_id');
        $token = new static;
        $token->user_id = $user->id;
        $token->status_id = $statusId;
        $token->token = str_random(50);
        $token->expires_at = \Carbon\Carbon::now()->addMinutes(61);
        $token->save();
        return $token;

    }

}
