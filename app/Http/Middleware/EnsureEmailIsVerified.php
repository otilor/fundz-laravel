<?php

namespace App\Http\Middleware;

use Closure;

class EnsureEmailIsVerified extends \Illuminate\Auth\Middleware\EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $redirectTo = null): mixed
    {
        if(auth()->user()->email_verified_at == null)
        {
            return redirect('/email/verify');
        }
        return parent::handle($request, $next);
    }
}
