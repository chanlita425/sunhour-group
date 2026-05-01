@extends('layouts.guest')
@php
    use Artesaos\SEOTools\Facades\SEOTools;
@endphp
@section('meta_tag')
    {!! SEOTools::generate() !!}
@endsection
@section('content')
    {{-- Navbar --}}
    @component('components.navbar')
    @endcomponent

    <div class="">

        <div class="relative h-full w-full">
            <img loading="lazy" src="{{ asset('images/career.jpg') }}" alt=""
                class="fixed top-0 left-0 w-full h-full object-cover" />
            <div class="fixed top-0 left-0 w-full h-full bg-black/30"></div>

            <div
                class="relative z-10 w-full max-w-screen-xl mx-auto px-3 md:px-5 mt-[8rem] lg:mt-[10rem]">
                <div data-aos="fade-down"
                    class="bg-gradient-to-r from-white/80 to-white/10 w-full mx-auto p-5 md:p-10 max-h-[70vh] overflow-y-auto">
                    {{-- <h1
                        class="font-bold {{ session()->get('locale') === 'en' ? "text-[32px] md:text-[32px] lg:text-[60px] leading-[32px] md:leading-[60px] font-['Inter']" : "text-[12px] md:text-[22px] lg:text-[40px] font-medium font-['Moul']  leading-[22px] md:leading-[70px]" }}">
                        @lang('message.career_title')​​</h1> --}}
                    <h1
                        class="text-[20px] md:text-[32px] lg:text-[40px] font-bold py-2 text-center">
                        🌟 @lang('message.career_title') 🌟
                    </h1>
                    <p
                        class="text-[14px] md:text-[16px] 2xl:text-[20px] font-bold text-center ">
                        @lang('message.career_titles') </p>
                    <div
                        class="text-[13px] md:text-[15px] 2xl:text-[18px] max-w-full md:max-w-[70%] pt-3 ">
                        <span class="font-bold tracking-widest">@lang('message.career_title1')</span>
                        <p class="pt-3">@lang('message.career_introduction_details1')</p>
                        <p class="pt-3">@lang('message.career_introduction_details2')</p>

                        <div class="flex flex-col gap-2 pt-3">
                            <p>🚿 <span class="font-bold">TOTO</span> – @lang('message.career_introduction_details3')</p>
                            <p>💧 <span class="font-bold">ARISTON</span> – @lang('message.career_introduction_details4')</p>
                            <p>🔄 <span class="font-bold">GRUNDFOS</span> – @lang('message.career_introduction_details5')</p>
                            <p>🛢 @lang('message.career_introduction_details6')</p>
                        </div>
                    </div>

                    <p
                        class="pt-5 text-[14px] md:text-[16px] 2xl:text-[20px] font-bold tracking-widest ">
                        @lang('message.career_title2')</p>

                    <div
                        class="w-full grid grid-cols-1 md:grid-cols-2 gap-4 py-4 px-0 md:px-4 text-[13px] md:text-[15px] 2xl:text-[18px] ">
                        <div class="w-full p-2 md:p-6 border border-[#000] rounded-md">
                            <h1 class="pb-4 font-bold">🔹 @lang('message.career_title3')</h1>
                            <ul class="flex flex-col list-disc gap-2 pl-5 md:pl-10 text-[13px] md:text-[14px] 2xl:text-[15px]">
                                <li>@lang('message.career_introduction_details7')</li>
                                <li>@lang('message.career_introduction_details8')</li>
                                <li>@lang('message.career_introduction_details9')</li>
                                <li>@lang('message.career_introduction_details10')</li>
                            </ul>
                        </div>
                        <div class="w-full p-2 md:p-6 border border-[#000] rounded-md">
                            <h1 class="pb-4 font-bold">🔹 @lang('message.career_title4')</h1>
                            <ul class="flex flex-col list-disc gap-2 pl-5 md:pl-10 text-[13px] md:text-[14px] 2xl:text-[15px]">
                                <li>@lang('message.career_introduction_details11')</li>
                                <li>@lang('message.career_introduction_details12')</li>
                                <li>@lang('message.career_introduction_details13')</li>
                                <li>@lang('message.career_introduction_details14')</li>
                            </ul>
                        </div>
                    </div>
                    <div
                        class="flex flex-col text-[14px] md:text-[16px] 2xl:text-[20px] font-bold tracking-widest ">
                        <p>📍 <span class="font-bold">@lang('message.career_title5') :</span> @lang('message.career_introduction_details15')</p>
                        <p>🕒 <span class="font-bold">@lang('message.career_title6') :</span> @lang('message.career_introduction_details16')</p>
                    </div>

                    <div
                        class="w-full text-[14px] md:text-[16px] 2xl:text-[20px] font-bold pt-4 ">
                        <h1 class="pb-2 font-bold tracking-widest">✅ @lang('message.career_title7'):</h1>
                        <ul class="flex flex-col list-disc gap-2 pl-10 text-[13px] md:text-[14px] 2xl:text-[15px]">
                            <li>@lang('message.career_introduction_details17')</li>
                            <li>@lang('message.career_introduction_details18')</li>
                            <li>@lang('message.career_introduction_details19')</li>
                            <li>@lang('message.career_introduction_details20')</li>
                            <li>@lang('message.career_introduction_details21')</li>
                        </ul>
                    </div>
                    <div
                        class="w-full text-[14px] md:text-[16px] 2xl:text-[20px] font-bold pt-4 ">
                        <h1 class="pb-2 font-bold tracking-widest">💼 @lang('message.career_title8'):</h1>
                        <ul class="flex flex-col list-disc gap-2 pl-10 text-[13px] md:text-[14px] 2xl:text-[15px]">
                            <li>@lang('message.career_introduction_details22')</li>
                            <li>@lang('message.career_introduction_details23')</li>
                            <li>@lang('message.career_introduction_details24')</li>
                            <li>@lang('message.career_introduction_details25')</li>
                        </ul>
                    </div>


                    <div>
                        <p class="pt-5 text-[14px] md:text-[16px] 2xl:text-[20px] font-bold tracking-widest ">
                            📩 @lang('message.career_title8')</p>
                        <p class="text-[13px] md:text-[15px] 2xl:text-[18px] pt-3 pl-8">@lang('message.career_introduction_details26') : <a class=" underline hover:text-[#3b83db]" href="https://mail.google.com/mail/?view=cm&fs=1&to=hr@sunhour.com">hr@sunhour.com</a></p>
                        <p class="text-[13px] md:text-[15px] 2xl:text-[18px] pt-3">📞 @lang('message.career_introduction_details27') :  <a class="" href="tel:+855 12 818 189">@lang('message.career_introduction_details30')</a></p>
                        <p class="text-[13px] md:text-[15px] 2xl:text-[18px] pt-3">📍 @lang('message.career_introduction_details28') : @lang('message.career_introduction_details29')</p>
                    </div>
                </div>
            </div>
        </div>

        <footer class="fixed inset-x-0 bottom-0 bg-white py-1">
            <p class="text-black text-[12px] text-center"> © Copyright 2024 SUNHOUR GROUP, All Rights Reserved</p>
        </footer>
    </div>
@endsection
