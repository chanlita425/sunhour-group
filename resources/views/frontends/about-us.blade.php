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
    <div class="m-0 p-0 h-screen overflow-x-hidden scroll-smooth !bg-white">
        <div class="relative h-full w-full">
            <img  loading="lazy" src="{{ asset('images/product-neorest-col.jpg') }}"
                class="fixed top-0 left-0 w-full h-full object-cover" />
            <div class="fixed inset-0 bg-black opacity-20"></div>

            <div class="relative z-10 w-full h-full overflow-y-auto mt-[10rem] pb-[20rem]">
                {{-- content --}}
                <div class="w-full max-w-screen-xl mx-auto px-3 md:px-5 py-4">
                    <h1
                        class="text-center md:text-start text-[32px] lg:text-[44px] xl:text-[64px] font-normal text-white mb-8
                        {{ session()->get('locale') === 'en' ? "text-[32px] md:text-[32px] lg:text-[60px] leading-[32px] md:leading-[60px]" : "text-[12px] md:text-[22px] lg:text-[40px] font-medium leading-[22px] md:leading-[70px]" }}">
                        @lang('message.aboutus')
                    </h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 justify-center gap-6">
                        <div class="bg-black/20 p-6 md:p-8 rounded-sm w-full">
                            <p
                                class="mb-4 text-white text-[16px] md:text-[24px] font-light whitespace-pre-line">
                                @lang('message.title_aboutus_2')
                            </p>
                            <p
                                class="text-white text-[11px] md:text-[14px] 2xl:text-[16px] font-light text-pretty whitespace-pre-line">
                                @lang('message.content_aboutus_2')
                            </p>
                        </div>
                        <div class="bg-black/20 p-6 md:p-8 rounded-sm w-full">
                            <p
                                class="mb-4 text-white text-[16px] md:text-[24px] font-light whitespace-pre-line">
                                @lang('message.title_aboutus_1')
                            </p>
                            <p
                                class="text-white text-[11px] md:text-[14px] 2xl:text-[16px] font-light text-pretty whitespace-pre-line">
                                @lang('message.content_aboutus_1')
                            </p>
                        </div>
                                      <div class="bg-black/20 p-6 md:p-8 rounded-sm w-full">
                            <p
                                class="mb-4 text-white text-[16px] md:text-[24px] font-light whitespace-pre-line">
                                @lang('message.title_aboutus')
                            </p>
                            <p
                                class="text-white text-[11px] md:text-[14px] 2xl:text-[16px] font-light text-pretty whitespace-pre-line">
                                @lang('message.content_aboutus')
                            </p>
                        </div>
                        <div class="bg-black/20 p-6 md:p-8 rounded-sm w-full">
                            <p
                                class="mb-4 text-white text-[16px] md:text-[24px] font-light whitespace-pre-line">
                                @lang('message.title_aboutus_3')
                            </p>
                            <p
                                class="text-white text-[11px] md:text-[14px] 2xl:text-[16px] font-light text-pretty whitespace-pre-line">
                                @lang('message.content_aboutus_3')
                            </p>
                        </div>
                        <div class="bg-black/20 p-6 md:p-8 rounded-sm w-full">
                            <p
                                class="mb-4 text-white text-[16px] md:text-[24px] font-light whitespace-pre-line">
                                @lang('message.title_aboutus_4')
                            </p>
                            <p
                                class="text-white text-[11px] md:text-[14px] 2xl:text-[16px] font-light text-pretty whitespace-pre-line">
                                @lang('message.content_aboutus_4')
                            </p>
                        </div>
                        <div class="bg-black/20 p-6 md:p-8 rounded-sm w-full">
                            <p
                                class="mb-4 text-white text-[16px] md:text-[24px] font-light whitespace-pre-line">
                                @lang('message.title_aboutus_6')
                            </p>
                            <p
                                class="text-white text-[11px] md:text-[14px] 2xl:text-[16px] font-light text-pretty whitespace-pre-line">
                                @lang('message.content_aboutus_6')
                            </p>
                        </div>
                        <div class="bg-black/20 p-6 md:p-8 rounded-sm w-full">
                            <p
                                class="mb-4 text-white text-[16px] md:text-[24px] font-light whitespace-pre-line">
                                @lang('message.title_aboutus_5')
                            </p>
                            <p
                                class="text-white text-[11px] md:text-[14px] 2xl:text-[16px] font-light text-pretty whitespace-pre-line">
                                @lang('message.content_aboutus_5')
                            </p>
                        </div>
                        <div class="bg-black/20 p-6 md:p-8 rounded-sm w-full">
                            <p
                                class="mb-4 text-white text-[16px] md:text-[24px] font-light whitespace-pre-line">
                                @lang('message.title_aboutus_7')
                            </p>
                            <p
                                class="text-white text-[11px] md:text-[14px] 2xl:text-[16px] font-light text-pretty whitespace-pre-line">
                                @lang('message.content_aboutus_7')
                            </p>
                        </div>
                        <div class="bg-black/20 p-6 md:p-8 rounded-sm w-full">
                            <p class="mb-4 text-white text-[16px] md:text-[24px] font-light whitespace-pre-line">
                                @lang('message.title_aboutus_8')
                            </p>
                            <p
                                class="text-white text-[11px] md:text-[14px] 2xl:text-[16px] font-light text-pretty whitespace-pre-line">
                                @lang('message.content_aboutus_8')
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="fixed w-full left-0 bottom-0 bg-white py-1">
                <p class="text-black text-[12px] text-center"> © Copyright 2024 SUNHOUR GROUP, All Rights Reserved</p>
            </footer>
        </div>
    </div>
@endsection
