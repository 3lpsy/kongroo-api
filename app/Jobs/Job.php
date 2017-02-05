<?php

namespace App\Jobs;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

abstract class Job implements ShouldQueue
{
    use SerializesModels;
}
