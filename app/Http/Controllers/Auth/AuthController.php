<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Storage;

    use App\Models\User;
    use Illuminate\Http\Request;
    use Tymon\JWTAuth\Facades\JWTAuth;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Cache;
    use Illuminate\Support\Facades\Validator;
    use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    /**
     * Show login page
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required',
        ]);

        $loginAttemptsKey = 'login_attempts_' . $request->ip();
        $banKey = 'login_ban_' . $request->ip();

        if (Cache::has($banKey)) {
            $remainingTime = Cache::get($banKey) - now()->timestamp;
            return redirect()->route('login')->with('error', "Too many failed attempts. Try again in {$remainingTime} seconds.");
        }

        try {
            // Use JWTAuth for login instead of auth()
            if (!$token = auth()->attempt($credentials)) {
                $attempts = Cache::get($loginAttemptsKey, 0);
                $attempts++;

                Cache::put($loginAttemptsKey, $attempts, 60);
                if ($attempts >= 3) {
                    Cache::put($banKey, now()->addMinute()->timestamp, 60);
                    Cache::forget($loginAttemptsKey);
                    return redirect()->route('login')->with('error', 'Too many failed attempts. Account locked for 1 minute.');
                }
                return redirect()->route('login')->with('error', 'Invalid name or password');
            }

            $user = auth()->user(); // Get the authenticated user from JWT

            // Store token in session or cookie (choose one)
            session(['jwt' => $token]);
            // Alternatively: return redirect()->route('dashboard.index')->withCookie(cookie('jwt', $token, 60));
            return redirect()->route('dashboard.index')->with('success', 'Login successful');

        } catch (JWTException $e) {
            \Log::error('Login JWT error', ['message' => $e->getMessage()]);
            return redirect()->route('login')->with('error', 'Could not create token: ' . $e->getMessage());
        }
    }

    /**
     * Show registration form
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle user registration and set JWT token
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user',
                'status' => 'inactive',
            ]);

            $token = JWTAuth::fromUser($user);

            if (!$token) {
                throw new JWTException('Could not generate token.');
            }

            // Store token in cookie
            return redirect()->route('dashboard.index')
                ->with('success', 'Registration successful! You are now logged in.')
                ->cookie('jwt', $token, 60); // 60 minutes expiration

        } catch (JWTException $e) {
            return redirect()->back()
                ->with('error', 'Registration failed: Could not create token. ' . $e->getMessage())
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Registration failed: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Get authenticated user
     */
    public function getUser(): \Illuminate\Http\RedirectResponse
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return redirect()->route('login')->with('error', 'User not found');
            }
            return redirect()->route('dashboard.index', compact('user'))->with('success', 'Login successful');
        } catch (JWTException $e) {
            return redirect()->route('login')->with('error', 'Invalid token: ' . $e->getMessage());
        }
    }

    /**
     * Handle logout request
     */
    public function logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $request->session()->forget('jwt'); // Clear session
            return redirect()->route('login')->with('success', 'Logged out successfully');
        } catch (JWTException $e) {
            return redirect()->route('login')->with('error', 'Failed to logout: ' . $e->getMessage());
        }
    }

    public function profile()
    {
        $user =  auth()->user();

        return view('auth.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'password' => 'nullable|string|min:6|confirmed',
            'password_confirmation' => 'nullable|string|min:6',
        ]);

        try {
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            if ($request->hasFile('image')) {
                if ($user->image) {
                   @unlink(public_path($user->image));
                }

                $imagePath = $request->file('image')->store('profile_photos', 'customize');
                $user->image = $imagePath;
            }


            $user->save();

            Auth::login($user);

            return redirect()->route('profile')->with('success', 'Profile has been updated');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Profile fail to updated: ' . $e->getMessage());
        }
    }
}
