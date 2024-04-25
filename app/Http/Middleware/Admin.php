<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Is user is authenticated
        if (Auth::check()) {
            if ($request->user()->isAdmin()) {
                return $next($request);
            } else {
                return redirect()->route('profile');
            }
        }
        // Not authenticated, redirect to login
        return redirect()->route('login');

    }
}
