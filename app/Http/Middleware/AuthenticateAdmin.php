<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   
        public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::guard("admins")->check()) { 
            return $next($request);
        }
        return redirect()->route('admin-login');
    }
    
}
