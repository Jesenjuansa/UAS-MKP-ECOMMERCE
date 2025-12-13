<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlockSuspended
{
    public function handle(Request $request, Closure $next)
    {
        // Jika user login tapi status suspended
        if (Auth::check() && Auth::user()->status === 'suspended') {

            Auth::logout();

            return redirect()->route('auth.login')
                ->withErrors(['login' => 'Your account has been suspended.']);
        }

        return $next($request);
    }
}
