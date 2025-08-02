<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- THIS IS THE FIX
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated AND has the 'admin' role.
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            // If not, abort the request with an "Unauthorized" error.
            abort(403, 'Unauthorized action.');
        }

        // If the user is an admin, allow the request to proceed.
        return $next($request);
    }
}