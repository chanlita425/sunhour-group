<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;

class Authenticate
{
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $token = session('jwt');

            if (!$token) {
                return redirect()->route('login')->with('error', 'Please login to access this page.');
            }

            // Set the token and authenticate to get the User model

            $user = auth()->user();

            if (!$user) {
                session()->forget('jwt');
                return redirect()->route('login')->with('error', 'Unable to authenticate user. Please login again.');
            }

            \Log::info('User authenticated', ['user' => $user->toArray()]);

            // Check role and status on the User model (assuming these are columns)
            if ($user->role === 'admin' && $user->status === 'active') {
                auth('web')->setUser($user); // Set the User object in the web guard
                return $next($request);
            }

            return redirect()->route('login')->with('error', 'Unauthorized access or inactive account');
        } catch (TokenExpiredException $e) {
            session()->forget('jwt');
            \Log::error('Token expired', ['message' => $e->getMessage()]);
            return redirect()->route('login')->with('error', 'Token has expired. Please login again.');
        } catch (TokenInvalidException $e) {
            session()->forget('jwt');
            \Log::error('Token invalid', ['message' => $e->getMessage()]);
            return redirect()->route('login')->with('error', 'Invalid token. Please login again.');
        } catch (JWTException $e) {
            session()->forget('jwt');
            \Log::error('JWT error', ['message' => $e->getMessage()]);
            return redirect()->route('login')->with('error', 'Authentication error: ' . $e->getMessage());
        }
    }
}
