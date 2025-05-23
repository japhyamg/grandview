<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if(auth()->check() && $request->user()->role !== $role){
            if ($request->user()->role == 'admin'  && !$request->is('admin/*')) {
                return redirect()->route('admin.dashboard');
            }
            if ($request->user()->role === 'user' && !$request->is('/*')) {
                return redirect()->route('user.dashboard');
            }
        }
        return $next($request);
    }
}
