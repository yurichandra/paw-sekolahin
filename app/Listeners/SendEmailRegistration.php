<?php

namespace App\Listeners;

use App\Events\UserRegistration;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailRegistration implements ShouldQueue
{
    public function handle(UserRegistration $event)
    {
        // Mail::to()
    }
}
