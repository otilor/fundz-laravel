<?php

namespace App\Listeners;

use App\Models\User;

class LogUserActivity
{
    public function __construct(private User $user )
    {
    }

    public function handle($event)
    {
        activity()
            ->causedBy($this->user)
            ->performedOn(User::class)
            ->log('Registered user');
    }
}
