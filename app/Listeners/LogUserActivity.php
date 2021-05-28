<?php

namespace App\Listeners;

use App\Models\User;
use Spatie\Activitylog\Facades\CauserResolver;

class LogUserActivity
{
    public function __construct(private User $user )
    {
    }

    public function handle($event)
    {
        CauserResolver::setCauser(User::find($event->user->id));
        activity()->log('Registered account');
    }
}
