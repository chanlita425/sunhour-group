<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;

class RedirectIfJWTAuthenticated
{
    public function handle(Request $request, Closure $next): Response
    {
        try {
            if (session('jwt')) {
                $payload = auth()->user();
                // Temporarily keep this for debugging

                if (!$payload) {
                    session()->forget('jwt');
                    return redirect()->route('login')->with('error', 'Unable to authenticate user. Please login again.');
                }
                // Use getPayload() after setToken()

                if ($payload['role'] === 'admin' && $payload['status'] === 'active') {
                    return $next($request);
                }
            }

            return $next($request);

        } catch (TokenExpiredException $e) {
            return redirect()->route('login')->with('error', 'Token has expired. Please login again.')
                ->withCookie(cookie()->forget('jwt'));
        } catch (TokenInvalidException $e) {
            return redirect()->route('login')->with('error', 'Invalid token. Please login again.')
                ->withCookie(cookie()->forget('jwt'));
        } catch (JWTException $e) {
            return $next($request);
        }
    }
}
