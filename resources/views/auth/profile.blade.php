@extends('layouts.app')

@section('content')
<div class="max-w-full mx-auto bg-white p-8 shadow-md rounded-lg">
    <div class="mb-4">
        <h2 class="text-2xl font-semibold text-gray-800">Edit Profile</h2>
        <p class="text-gray-400 text-[14px]">Mannage Your Profile and account settings</p>
    </div>

    {{-- Profile Edit Form --}}
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-10">
        @csrf
        @method('PUT')

        {{-- Profile Image Preview --}}
        <div class="mb-4 flex items-center w-1/2">
            <img id="photoPreview"
                src="{{ !empty($user->image) ? asset($user->image) : asset('https://placehold.co/100x100') }}"
                alt="Profile Photo" class="w-24 h-24 rounded-full mx-auto mb-2">

            <div>
                <label for="uploadProfile" class="flex items-center gap-4 uppercase bg-gray-800 text-white py-4 px-6 tracking-[1.5px] cursor-pointer text-[14px] rounded-sm font-medium">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                            <path d="M7 9l5 -5l5 5"></path>
                            <path d="M12 4l0 12"></path>
                        </svg>
                    </span>
                    Upload Profile Image</label>
                <input type="file" id="uploadProfile" name="image" accept="image/*" onchange="previewImage(event)"
                    class="!text-gray-200 w-full py-2 rounded hidden">
                @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4 !text-gray-200">
                <label class="block text-[14px] text-gray-700 font-medium">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="!text-gray-200 w-full p-2 border border-gray-600 rounded">
                @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-[14px] text-gray-700 font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="!text-gray-200 w-full p-2 border border-gray-600 rounded">
                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>


            <div x-data="{ show: false }">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative !text-gray-200">
                    <input :type="show ? 'text' : 'password'" name="password" id="password"
                        class="w-full p-2 border border-gray-600 rounded"
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
                </div>
                @error('password')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div x-data="{ show: false }">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <div class="relative !text-gray-200">
                    <input :type="show ? 'text' : 'password'" name="password_confirmation" id="password_confirmation"
                        class="w-full p-2 border border-gray-600 rounded"
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
                </div>
                @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex items-center space-x-4 mt-6">
            <button type="submit"
                class="text-white text-[16px] px-5 py-2 rounded-sm bg-gray-800">
                Save
            </button>

            {{-- Success & Error Messages --}}
            @if(session('success'))
                <div class="text-green-500">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="text-red-500">{{ session('error') }}</div>
            @endif
        </div>
    </form>
</div>


<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            document.getElementById('photoPreview').src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");
        const password = document.getElementById("password");
        const confirmPassword = document.getElementById("password_confirmation");

        form.addEventListener("submit", function (event) {
            if (password.value !== confirmPassword.value) {
                event.preventDefault();
                // alert("Password and Confirm Password do not match!");
            }
        });
    });
</script>
@endsection

