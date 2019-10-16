<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Récupérer le user connecté et verifier son rôle > admin ou pas ?
        if( !$request->user() || !$request->user()->hasRole('admin') ) {
            return redirect(route('homepage'))
                ->with('notice','bien tenté, mais c\'est non');
        }
        return $next($request);
    }
}
