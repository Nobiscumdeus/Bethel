<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
		//Check if the user is an administrator
			if (!$request->session()->has('admin')){
				//If not authenticated as admin, redirect to login page 
				return redirect()->route('bethelattendance.login');
			}
		
        return $next($request);
    }
}
