<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockDirectURL
{
    public function handle(Request $request, Closure $next)
    {
        // Jika halaman diakses langsung lewat URL (tanpa referer)
        if (!$request->headers->has('referer')) {
            return redirect('/')->with('error', 'Direct URL access is not allowed.');
        }

        return $next($request);
    }
}
