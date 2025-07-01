@extends('layouts.guest')
@section('meta_tag')
 {!! SEO::generate() !!}    
@endsection
@section('content')
    {{-- Navbar --}}
    @component('components.navbar')
    @endcomponent
    <div class="m-0 p-0 overflow-x-hidden">

        <div class="relative flex flex-col justify-center min-h-screen w-full">
        <video id="myVideo" class="absolute inset-0 w-full h-full object-cover object-center"
               autoplay
               muted
               playsinline
               loop
               preload="metadata">
            <source src="{{ asset('videos/backgrounds.mp4') }}" type="video/mp4">
            Your browser doesn't support HTML5 video tag.
        </video>

            <div class="absolute inset-0 bg-black opacity-20"></div>

            {{-- content --}}
            <div class="relative z-10">
                {{-- Header --}}
                <div class="w-full max-w-2xl mx-auto px-3 md:px-5">
                    <p data-aos="fade-left"
                        class="text-white text-[24px] font-light
                    {{ session()->get('locale') === 'en' ? "font-['Inter']" : "font-['Moul']" }}
                    ">
                        @lang('message.welcome')</p>
                    <h1 data-aos="fade-right"
                        class="text-[32px] md:text-[42px] xl:text-[42px] 2xl:text-[62px] font-bold text-white ">
                        @lang('message.sunhour') <span class="font-light">@lang('message.group')</span>
                    </h1>
                    <p data-aos="fade-right"
                        class="text-white text-[16px] md:text-[20px] xl:text-[18px] font-light text-pretty
                    {{ session()->get('locale') === 'en' ? "font-['Inter']" : "font-['Siemreap']" }}
                    ">
                        @lang('message.description_cm')
                    </p>
                </div>
            </div>

            {{-- footer --}}
            <footer class="absolute inset-x-0 bottom-0 bg-white py-1">
                <p class="text-black text-[12px] text-center"> © Copyright 2024 SUNHOUR GROUP, All Rights Reserved</p>
            </footer>
        </div>
    </div>
@endsection
