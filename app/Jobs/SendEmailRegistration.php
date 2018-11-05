<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered;

class SendEmailRegistration extends Job
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        try {
            Mail::to($user->email)->send(new UserRegistered($user));
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }
}
