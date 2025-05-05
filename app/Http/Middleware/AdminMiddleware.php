<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) { // Check if the user is NOT logged in
            return redirect('/unauthorized');
        }

        // If they are logged in, we still need to check if they are an admin
        if (!Auth::user()->isAdmin()) {
            return redirect('/unauthorized');
        }

        return $next($request);
    }
}