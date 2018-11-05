<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class UserRegistration
{
    use SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
