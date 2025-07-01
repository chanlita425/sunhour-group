@extends('layouts.guest')
@section('content')
<div class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold text-center text-gray-700">Login Admin System</h1>
        <p class="mt-2 text-sm text-center text-gray-500">
            Please enter your credentials to access your account.
        </p>

        @if(session('error'))
            <div class="mt-4 p-3 text-sm text-red-800 bg-red-100 border border-red-400 rounded-md">
                <strong>Oops! </strong> {{ session('error') }}
            </div>
        @endif
        
        @if(session('success'))
            <div class="mt-4 p-3 text-sm text-green-800 bg-green-100 border border-green-400 rounded-md">
                <strong>Success! </strong> {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="mt-6 space-y-4">
            @csrf
            @method('POST')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
                <div class="relative">
                    <input type="text" name="name" id="name"
                        class="w-full px-4 py-3 text-sm bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Enter Username" >
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
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

            <div class="flex items-center justify-between">
                <a href="{{ route('register') }}" class="text-sm text-gray-500 hover:text-gray-700">Don't have an account? Register</a>
            </div>
            <button type="submit"
                class="w-full px-4 py-3 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Sign in
            </button>
        </form>
    </div>
</div>
@endsection
