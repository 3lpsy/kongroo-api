<?php

namespace App\Mail\Auth;

use App\Models\Access\User\User;
use App\Models\Access\LoginToken\LoginToken;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginTokenRequested extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $token;

    public function __construct(User $user, LoginToken $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.auth.login-token.requested')
            ->to($this->user->email)
            ->from(env("MAIL_ACCOUNT"))
            ->with([
                'token' => $this->token,
                'user' => $this->user
            ]);
    }
}
