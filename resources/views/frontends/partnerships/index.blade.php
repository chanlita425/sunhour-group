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
    <div class="m-0 p-0 h-screen overflow-x-hidden scroll-smooth">

        <div class="relative h-full w-full">
            <div class="fixed top-0 left-0 w-full h-full bg-white"></div>
            {{-- content --}}
            <div class="relative z-10 mt-[5rem] md:mt-[10rem] pb-[10rem]">
                <div class="w-full max-w-screen-xl mx-auto px-3 md:px-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 justify-center items-center gap-7 rounded-sm">
                        <div class="w-full h-full">
                            <h1 data-aos="fade-down" class="text-[32px] md:text-[50px] lg:text-[60px] font-bold whitespace-pre-line leading-[32px] md:leading-[60px] {{ session()->get('locale') === 'en' ? 'text-[32px] md:text-[32px] lg:text-[60px] leading-[32px] md:leading-[60px]' : 'text-[12px] md:text-[22px] lg:text-[40px] font-medium leading-[22px] md:leading-[70px]' }}">
                                @lang('message.WTBOP')
                            </h1>
                            <p data-aos="fade-up" class="text-gray-700 text-sm mt-2 whitespace-pre-line ">
                                @lang('message.content_pns')
                            </p>
                        </div>
                        <div data-aos="fade-left" class="w-full xl:max-w-[450px] bg-black h-full p-3 xl:p-8 2xl:p-10">
                            <form action="{{ route('send.mail') }}" method="POST">
                                @csrf
                                <div class="flex flex-col gap-2 md:gap-5">
                                    <input type="text" name="cname" id="cname"
                                        class="w-full text-white bg-[#444444] text-[14px] p-2"
                                        placeholder="@lang('message.cname')" required>

                                    <input type="text" name="cweb" id="cweb"
                                        class="w-full text-white bg-[#444444] text-[14px] p-2"
                                        placeholder="@lang('message.cwebsite')" required>

                                    <input type="text" name="fullName" id="fullName"
                                        class="w-full text-white bg-[#444444] text-[14px] p-2"
                                        placeholder="@lang('message.fullname')" required>

                                    <div class="flex gap-2">
                                        <input type="text" name="title" id="title"
                                            class="w-full text-white bg-[#444444] text-[14px] p-2"
                                            placeholder="@lang('message.title')" required>

                                        <input type="text" name="phone" id="phone"
                                            class="w-full text-white bg-[#444444] text-[14px] p-2"
                                            placeholder="@lang('message.phone')" required>
                                    </div>

                                    <input type="email" name="email" id="email"
                                        class="w-full text-white bg-[#444444] text-[14px] p-2"
                                        placeholder="@lang('message.email')" required>

                                    <input type="text" name="country" id="country"
                                        class="w-full text-white bg-[#444444] text-[14px] p-2"
                                        placeholder="@lang('message.country')" required>

                                    <textarea name="message" id="message" class="w-full text-white bg-[#444444] text-[14px] p-2"
                                        placeholder="@lang('message.msg')" required></textarea>

                                    <button type="submit"
                                        class="text-[14px] w-[150px] text-gray-800 bg-gray-100 p-2">@lang('message.submit')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <footer class="w-full fixed left-0 bottom-0 bg-black py-1 z-[50]">
            <p class="text-white text-[12px] text-center"> © Copyright 2024 SUNHOUR GROUP, All Rights Reserved</p>
        </footer>
    </div>
@endsection
