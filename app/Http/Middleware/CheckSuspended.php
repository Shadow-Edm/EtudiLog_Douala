<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CheckSuspended
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            if(
            auth()->check()
            && auth()->user()->is_suspended
        ){

            auth()->logout();

            return redirect('/login')
                ->withErrors([
                    'email' => 'Votre compte est suspendu.'
                ]);
        }

        return $next($request);
        }
}
