<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if(!Auth::guard('api')->user() || Auth::guard('api')->user()->role !== $role) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        
        return $next($request);
    }
}
