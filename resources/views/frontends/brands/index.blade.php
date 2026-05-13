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
    <div class="m-0 p-0 h-screen overflow-x-hidden scroll-smooth overflow-y-hidden">

        <div class="relative h-full w-full">
            <video
                autoplay="autoplay" loop="loop" muted playsinline
                class="fixed top-0 left-0 w-full h-full object-cover"
                >
                <source src="{{ asset('videos/bg_about.mp4') }}" type="video/mp4">
                </video>
            <div class="fixed top-0 left-0 w-full h-full bg-black opacity-50"></div>

            {{-- content --}}
            <div class="relative z-10 mt-[10rem]">
                <div class="w-full max-w-screen-xl mx-auto px-3 md:px-5">
                    <div class="w-full mx-auto">
                        <p data-aos="fade-left"
                            class="text-white text-[24px] font-light
                            ">
                            {{-- @lang('message.welcome') --}}
                        </p>
                        <h1 data-aos="fade-right"
                            class="text-xl md:text-2xl xl:text-[32px] 2xl:text-[42px] font-bold text-white  mb-4">
                            @lang('message.sunhour_brand') <span class="font-light"></span>

                        </h1>
                        <p data-aos="fade-right "
                            class="text-white text-[16px] md:text-[20px] xl:text-[18px] font-light text-pretty">
                            @lang('message.description_brand')
                        </p>
                    </div>
                    <h1
                        class="text-start text-[32px] lg:text-[44px] xl:text-[56px] font-normal text-white my-[1rem]
                        {{ session()->get('locale') === 'en' ? "text-[32px] md:text-[32px] lg:text-[60px]  leading-[32px] md:leading-[60px]" : "text-[12px] md:text-[22px] lg:text-[40px] font-medium  leading-[22px] md:leading-[70px]" }}                    ">
                        @lang('message.brand')
                    </h1>
                    <div class="overflow-x-hidden overflow-y-auto scroll-smooth h-[50vh]">
                        <div
                            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 justify-center items-center gap-6 rounded-sm">
                            @foreach ($brand as $brands)
                                <a href="{{ route('brands-client.show', ['locale' => app()->getLocale(), 'skug' => $brands->slug]) }}"
                                    class="{{ $brands->name === 'Toto' ? 'order-first' : '' }} inline-flex justify-center  bg-transparent px-[5em] py-[16px] w-full h-fit border-b-2 border-white group hover:bg-gray-200 hover:border-black transition-all duration-300">
                                    <span class="mx-auto !text-white group-hover:!text-black transition-all duration-300">
                                        <div
                                            class="[&>svg]:fill-current [&>svg]:[fill:currentColor] [&>svg]:w-full [&>svg]:h-full">
                                            {!! str_replace('fill="currentColor"', 'fill="currentColor" style="fill: currentColor;"', $brands->logoSvg) !!}
                                        </div>
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <footer class="absolute inset-x-0 bottom-0 bg-white py-1">
                <p class="text-black text-[12px] text-center"> © Copyright 2024 SUNHOUR GROUP, All Rights Reserved</p>
            </footer>
        </div>
    </div>
@endsection
