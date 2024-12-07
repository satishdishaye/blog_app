<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::guard("users")->check()) {
            
            return $next($request);
        }
        return redirect()->route('user-login');
    }
}

