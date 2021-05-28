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
        if (in_array(env('APP_ENV'), ['local', 'dev'])) {
            return $next($request);
        }

        return parent::handle($request, $next);
    }
}
