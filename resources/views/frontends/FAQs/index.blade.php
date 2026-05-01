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

        {{-- content --}}
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

        <section id="faqs" class="bg-white py-16 relative top-[80px]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <h2 class="text-2xl md:text-2xl font-extrabold text-gray-900 mb-16 leading-none">
                    {{ app()->getLocale() === 'en'
                        ? 'Frequently Asked Questions'
                        : (app()->getLocale() === 'km'
                            ? 'សំណួរដែលសួរញឹកញ៉ាប់'
                            : 'Frequently Asked Questions') }}
                </h2>

                <div class="flex flex-col lg:flex-row lg:space-x-12">

                    <div class="w-full lg:w-2/3">

                        {{-- <div class="relative mb-12">
                            <input type="text" placeholder="What are you looking for?"
                                class="w-full py-3 pl-12 pr-4 text-gray-900 border-b border-gray-300 focus:outline-none focus:border-gray-500 text-lg transition duration-200">
                            <svg class="w-6 h-6 text-gray-500 absolute left-4 top-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div> --}}

                        <div class="space-y-0 divide-y divide-gray-200">
                            {{-- Loop through the FAQs data passed from the controller --}}
                            @foreach ($faqs as $item)
                                <div x-data="{ open: false }" class="py-4">
                                    {{-- Question Button --}}
                                    <button @click="open = !open" :aria-expanded="open"
                                        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
                                        <h3 class="font-meduim text-md text-gray-800">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">
                                                {{ app()->getLocale() === 'en' ? 'Q:' : (app()->getLocale() === 'km' ? 'សំណួរ៖' : 'Q:') }}
                                               </span>
                                            {{ app()->getLocale() === 'en'
                                                ? $item->q_english
                                                : (app()->getLocale() === 'km'
                                                    ? $item->q_khmer
                                                    : $item->q_china) }}
                                        </h3>

                                        {{-- Toggle Icon --}}
                                        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>

                                    {{-- Answer Content (Collapsible) --}}
                                    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
                                        <p class="text-gray-600 text-base">
                                            {{-- Answer Label (Changed to Red for distinction) --}}
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 mb-4">
                                                {{ app()->getLocale() === 'en' ? 'A:' : (app()->getLocale() === 'km' ? 'ចម្លើយ៖' : 'A:') }}
                                            </span>

                                            {{ app()->getLocale() === 'en'
                                                ? $item->a_english
                                                : (app()->getLocale() === 'km'
                                                    ? $item->a_khmer
                                                    : $item->a_china) }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="absolute inset-x-0 bottom-0 bg-black py-1 z-[50]">
            <p class="text-white text-[12px] text-center"> © Copyright 2024 SUNHOUR GROUP, All Rights Reserved</p>
        </footer>
    </div>
@endsection

{{-- <div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            What types of water purifier systems does Sun Hour supply for projects?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            We provide whole-building filtration, RO systems, and centralized purification
            suitable for
            condominiums, hotels, factories, and offices.
        </p>
    </div>
</div>
<div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            How long does installation take for a commercial water purifier?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            Most systems take 1–3 days, depending on project size.
        </p>
    </div>
</div>
<div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            What brands of water dispensers does Sun Hour offer for B2B clients?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            We provide certified brands suitable for offices, schools, hospitals, and factories.
            Internal Link: Link to Blog 2
        </p>
    </div>
</div>
<div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            Do you offer hot & cold dispensers for buildings?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            Yes. Options include tabletop, standing, and pipeline-connected dispensers.
        </p>
    </div>
</div>
<div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            Which water heating system is suitable for large buildings?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            For projects, heat pump and solar heating systems reduce electricity cost by up to
            70%.
            Internal Link: Link to Blog 3
        </p>
    </div>
</div>
<div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            Do you provide engineering consultation?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            Yes. Our team performs site surveys, sizing calculations, and installation.
        </p>
    </div>
</div>
<div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            Why do high-rise buildings in Phnom Penh need a transfer pump?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            To stabilize water pressure from ground tank to roof tank.
            Internal Link: Link to Blog 4
        </p>
    </div>
</div>
<div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            Does Sun Hour provide industry-grade pumps?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            Yes. We supply Grundfos pumps for condos, hotels, malls, and factories.
        </p>
    </div>
</div>
<div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            Why do many projects in Cambodia choose TOTO?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            Because of durability, water-saving performance, and long-term hygiene.
            Internal Link: Link to Blog 5
        </p>
    </div>
</div>
<div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            Do you provide project pricing?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            Yes. Special pricing available for B2B partners.
        </p>
    </div>
</div>
<div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            Do you supply bathtubs for luxury condos and hotels?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            Yes. Multiple materials: acrylic, stone, freestanding, built-in.
            Internal Link: Link to Blog 6
        </p>
    </div>
</div>
<div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            Do you provide delivery and installation?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            Yes.
        </p>
    </div>
</div>
<div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            What size tiles are popular in Cambodian projects?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            60x60, 60x120, 80x80 for floors and 30x60 for walls.
            Internal Link: Link to Blog 7
        </p>
    </div>
</div>
<div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            Do you offer special pricing for bulk tile orders?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            Yes.
        </p>
    </div>
</div>
<div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            How much electricity can a heat pump save for buildings?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            Up to 70% less energy than electric heaters.
            Internal Link: Link to Blog 8
        </p>
    </div>
</div>
<div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            Is it suitable for factories?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            Yes—excellent for high-volume water heating.
        </p>
    </div>
</div>
<div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            What is a complete water system for a building?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            Pump + Filter + Heater + Transfer + Plumbing solution.
            Internal Link: Link to Blog 9
        </p>
    </div>
</div>
<div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            Do you provide system design?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            Yes. Engineering blueprint and BOQ included.
        </p>
    </div>
</div>
<div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            What accessories does Sun Hour supply for projects?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            Towel bars, shower heads, faucets, floor drains, mirrors, and more.
            Internal Link: Link to Blog 10
        </p>
    </div>
</div>
<div x-data="{ open: false }" class="py-4">
    <button @click="open = !open" :aria-expanded="open"
        class="flex justify-between items-center w-full text-left focus:outline-none py-2 hover:text-gray-900 transition duration-150">
        <h3 class="font-meduim text-md text-gray-800">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">Q:</span>
            Do you have stock for large orders?
        </h3>
        <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
            class="w-6 h-6 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" x-collapse.duration.300ms class="pr-10 pt-3">
        <p class="text-gray-600 text-base">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-blue-800 mb-4">A:</span>
            Yes—warehouse in Phnom Penh.
        </p>
    </div>
</div> --}}
