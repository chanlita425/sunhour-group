@extends('layouts.guest')

@section('content')
<div class="flex min-h-screen items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-semibold text-gray-900">Create an Account</h1>
            <p class="text-gray-500 mt-2">Register to access the School System</p>
        </div>

        @if(session('error'))
            <div class="mb-4 p-3 text-sm text-red-700 bg-red-100 rounded-md">
                {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="mb-4 p-3 text-sm text-green-700 bg-green-100 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" 
                    placeholder="Enter your full name"
                    class="mt-1 w-full p-3 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('name') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" 
                    placeholder="Enter your email address"
                    class="mt-1 w-full p-3 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('email') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
            
            <div x-data="{ show: false }">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative">
                    <input :type="show ? 'text' : 'password'" name="password" id="password"
                        class="w-full px-4 py-3 text-sm bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Enter password">
                    <button type="button" @click="show = !show" class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="1.25">
                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                        </svg>
                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="1.25">
                            <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828"></path>
                            <path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87"></path>
                            <path d="M3 3l18 18"></path>
                        </svg>
                    </button>
                    @error('password')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div x-data="{ show: false }">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <div class="relative">
                    <input :type="show ? 'text' : 'password'" name="password_confirmation" id="password_confirmation"
                        class="w-full px-4 py-3 text-sm bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Confirm password">
                    <button type="button" @click="show = !show" class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="1.25">
                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                        </svg>
                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="1.25">
                            <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828"></path>
                            <path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87"></path>
                            <path d="M3 3l18 18"></path>
                        </svg>
                    </button>
                    @error('password_confirmation')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div>
                <button type="submit"
                    class="w-full p-3 text-white font-medium bg-blue-600 rounded-lg shadow hover:bg-blue-700 transition">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
