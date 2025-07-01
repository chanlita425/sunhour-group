<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next): Response
    {
        try {
            // Check if user is authenticated via web guard (session-based)
            if (auth('web')->check()) {
                $user = auth('web')->user();
            } else {
                // Attempt to authenticate via JWT token
                $user =  auth()->parseToken()->authenticate();
            }

            // Check user role and status
            if ($user->role === 'admin' && $user->status === 'active') {
                return redirect()->route('dashboard.index');
            }
            return redirect()->route('login')->with('error', 'Unauthorized access or inactive account');
        } catch (TokenExpiredException $e) {
            return redirect()->route('login')->with('error', 'Token has expired. Please login again.');
        } catch (TokenInvalidException $e) {
            return redirect()->route('login')->with('error', 'Invalid token. Please login again.');
        } catch (JWTException $e) {
            // If no token is provided or another JWT error occurs, proceed to the next middleware
            return $next($request);
        }
    }
}
