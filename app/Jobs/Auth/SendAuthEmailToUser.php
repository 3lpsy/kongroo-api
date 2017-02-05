<?php
namespace App\Jobs\Auth;

use App\Jobs\QueuedJob;
use App\Models\Access\User\User;
use Illuminate\Mail\Mailer;

class SendAuthEmailToUser extends QueuedJob
{

    protected $user;


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
        
        app('log')->info('handled');
        // dump($this->mailer);

        // # Instantiate the client.
        // $mgClient = new Mailgun('YOUR_API_KEY');
        // $domain = "YOUR_DOMAIN_NAME";
        //
        // # Make the call to the client.
        // $result = $mgClient->sendMessage($domain, array(
        //     'from'    => 'Excited User <mailgun@YOUR_DOMAIN_NAME>',
        //     'to'      => 'Baz <YOU@YOUR_DOMAIN_NAME>',
        //     'subject' => 'Hello',
        //     'text'    => 'Testing some Mailgun awesomness!'
        // ));
    }
}
