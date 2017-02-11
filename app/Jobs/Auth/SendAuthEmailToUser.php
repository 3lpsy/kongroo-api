<?php
namespace App\Jobs\Auth;

use App\Jobs\QueuedJob;
use App\Models\Access\User\User;
use App\Models\Access\LoginToken\LoginToken;

use Illuminate\Mail\Mailer;
use App\Mail\Auth\LoginTokenRequested;

class SendAuthEmailToUser extends QueuedJob
{
    protected $user;

    protected $mailer;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    public function handle()
    {
        $mailer = app('mailer');

        $token = LoginToken::generateFor($this->user);

        $email = new LoginTokenRequested($this->user, $token);

        $email->send($mailer);

        app('log')->info('handled: SendAuthEmailToUser');
    }
}
