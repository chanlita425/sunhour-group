@extends('layouts.guest')
@section('meta_tag')
 {!! SEO::generate() !!}
@endsection
@section('content')
    {{-- Navbar --}}
    @component('components.navbar')
    @endcomponent
    <div class="m-0 p-0 h-screen overflow-x-hidden scroll-smooth">

        <div class="relative h-full w-full">
            <img loading="lazy" src="{{asset('images/career.jpg')}}" alt="" 
            class="fixed top-0 left-0 w-full h-full object-cover"
            />
            <div class="fixed top-0 left-0 w-full h-full bg-black/30"></div>
            {{-- content --}}
            <div class="relative z-10  w-full max-w-screen-xl mx-auto px-3 md:px-5 mt-[5rem] md:mt-[13rem] pb-[20rem]">
                <div data-aos="fade-down" class="bg-gradient-to-r from-white/80 to-white/10 w-full mx-auto p-5 md:p-10">
                    <h1 class="font-bold {{session()->get('locale') === 'en' ? "text-[32px] md:text-[32px] lg:text-[60px]  leading-[32px] md:leading-[60px] font-['Inter']":"text-[12px] md:text-[22px] lg:text-[40px] font-medium font-['Moul']  leading-[22px] md:leading-[70px]"}}">@lang('message.career')</h1>
                    <p class="text-[14px] md:text-[16px] 2xl:text-[20px] whitespace-pre-line
                    {{session()->get('locale') === 'en' ? "font-['Inter']":"font-['Siemreap']"}}
                    ">
                        @lang('message.content_career')
                    </p>
                    <div class="w-fit flex items-center gap-2 p-1 bg-black md:p-2 rounded-full text-white pe-[2rem] mt-4">
                        <span class="bg-white rounded-full p-2 text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" stroke-width="1.25">
                            <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path>
                            <path d="M3 7l9 6l9 -6"></path>
                            </svg>
                        </span>
                        <span>ssl@sunhourgroup.com.kh</span>
                    </div>
                </div>
            </div>
            <footer class="absolute inset-x-0 bottom-0 bg-white py-1">
                <p class="text-black text-[12px] text-center"> © Copyright 2024 SUNHOUR GROUP, All Rights Reserved</p>
            </footer>
        </div>
    </div>
@endsection
