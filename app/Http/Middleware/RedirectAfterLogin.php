<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectAfterLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        
        if ($request->routeIs('login') && auth()->check()) {
            return auth()->user()->usertype === 'admin'
                ? redirect()->route('admin.dashboard')
                : redirect()->route('dashboard');
        }

        return $response;
    }
}