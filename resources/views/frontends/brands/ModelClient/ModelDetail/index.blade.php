@extends('layouts.guest')
@php
    use Artesaos\SEOTools\Facades\SEOTools;
@endphp
@section('meta_tag')
    {!! SEOTools::generate() !!}
@endsection
@section('content')
    @component('components.navbar')
    @endcomponent
    <div class="m-0 p-0 h-screen overflow-x-hidden scroll-smooth">
        <div class="w-full mb-[7rem] my-[5rem] xl:my-[10rem]">
            {{-- content --}}
            <div class="w-full max-w-screen-xl mx-auto px-3 md:px-5">
                <a href="{{ route('brands-client.model', [$models->products->brands->slug, $models->products->slug]) }}"
                    class="inline-flex items-center gap-2 hover:underline mt-4 md:mt-[6rem] xl:mt-5">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" width="16" height="16" stroke-width="2">
                            <path d="M19 18v-6a3 3 0 0 0 -3 -3h-7"></path>
                            <path d="M13 13l-4 -4l4 -4m-5 8l-4 -4l4 -4"></path>
                        </svg>
                    </span>
                    <span>
                        Back
                    </span>
                </a>
                <div class="w-full">
                    <div class="grid grid-cols-1 lg:grid-cols-2 justify-center items-center gap-7 rounded-sm">
                        <div class="w-full h-full 2xl:h-[70vh]">
                            <div class="flex flex-col">
                                <h1 class="text-3xl font-bold">{{ $models->name }}</h1>
                                <div class="inline-flex items-center">
                                    <h1 class="text-xl font-bold">{{ $models->products->name }}</h1>
                                </div>
                                <img loading="lazy" src="{{ $models->link }}" alt=""
                                    class="{{ $models->products->brands->uuid == 'bXRMSTQ3OC0y' ? 'w-[440px]' : 'w-[350px]' }} mx-auto object-contain object-center mt-2">
                            </div>
                        </div>
                        <div class="w-full h-full 2xl:h-[70vh]">
                            <ul
                                class="max-sm:h-[5vh] max-sm:overflow-x-scroll  px-2 md:px-0  flex justify-start items-center gap-2">
                                <li class="{{ $features->contains('model_id', $models->uuid) ? '' : 'hidden' }}">
                                    <a href="#features"
                                        class="tab-link text-[16px] font-medium font-['Inter'] px-4 py-1 text-gray-900 rounded-sm hover:bg-gray-900 hover:text-white active transition-all duration-300">
                                        Features
                                    </a>
                                </li>
                                <li class="{{ $spaces->contains('model_id', $models->uuid) ? '' : 'hidden' }}">
                                    <a href="#space"
                                        class="tab-link {{ $spaces->contains('model_id', $models->uuid) && !$features->contains('model_id', $models->uuid) ? 'active' : '' }} text-[16px] font-medium font-['Inter'] px-4 py-1 text-gray-900 border border-gray-900 rounded-sm hover:bg-gray-900 hover:text-white transition-all duration-300">
                                        Specs
                                    </a>
                                </li>
                                <li class="{{ empty($medias) ? 'hidden' : '' }}">
                                    <a href="#video"
                                        class="tab-link text-[16px] font-medium font-['Inter'] px-4 py-1 text-gray-900 border border-gray-900 rounded-sm hover:bg-gray-900 hover:text-white transition-all duration-300">
                                        Videos
                                    </a>
                                </li>
                                <li class="{{ $fileDownloads->contains('model_id', $models->uuid) ? '' : 'hidden' }}">
                                    <a href="#download"
                                        class="tab-link text-[16px] font-medium font-['Inter'] px-4 py-1 text-gray-900 border border-gray-900 rounded-sm hover:bg-gray-900 hover:text-white transition-all duration-300">
                                        Downloads
                                    </a>
                                </li>
                            </ul>

                            <div class="content-tabs my-3">
                                <!-- Features Tab -->
                                <div id="features" class="tab-content active">
                                    <ul
                                        class="text-[12px] md:text-[14px] 2xl:text-[16px] list-disc ml-5 mt-2 text-gray-700 font-[300] font-['Inter']">
                                        @foreach ($features as $feature)
                                            @if ($feature->model_id === $models->uuid && !empty($feature->description))
                                                <li class="whitespace-pre-line">{{ $feature->description }}</li>
                                            @else
                                                <h1 class="text-md text-[#fff]">Not Available!</h1>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                                <!-- Space Tab -->
                                <div id="space"
                                    class="tab-content hidden {{ $spaces->contains('model_id', $models->uuid) && !$features->contains('model_id', $models->uuid) ? 'active' : '' }}">
                                    <ul
                                        class="mt-2 text-[12px] md:text-[14px] 2xl:text-[16px] text-gray-700 font-[300] font-['Inter']">
                                        @foreach ($spaces as $space)
                                            @if ($space->model_id === $models->uuid)
                                                <li class="grid grid-cols-3 space-x-4">
                                                    <b class="col-span-1 font-[600]">
                                                        {{ $space->type }}
                                                    </b>
                                                    <p class="col-span-2 whitespace-pre-line">{{ $space->description }}
                                                    </p>
                                                </li>
                                            @else
                                                <h1 class="text-[14px] text-[#000]">Not Available!</h1>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                                <!-- Video Tab -->
                                <div id="video" class="tab-content hidden">
                                    <div class="mt-3">
                                        @if (!empty($medias->link))
                                            <iframe class="w-full h-[34vh]" src="{{ $medias->link }}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                                            </iframe>
                                        @else
                                            <h1 class="text-[14px] text-[#000]">Not Available!</h1>
                                        @endif
                                    </div>
                                </div>

                                <!-- Download Tab -->
                                <div id="download" class="tab-content hidden">
                                    <ul class="mt-3 space-y-3">
                                        @foreach ($fileDownloads as $fileDownload)
                                            @if ($fileDownload->model_id === $models->uuid && !empty($fileDownload->path) && !empty($fileDownload->name))
                                                <li class="flex items-start space-x-4">
                                                    <a class="flex items-center gap-5" href="{{ $fileDownload->path }}"
                                                        target="_new">
                                                        <img loading="lazy" src="{{ $fileDownload->icon }}" alt="pdf"
                                                            class="w-5 md:w-7">
                                                        <span
                                                            class="relative
                                                                                                                                                                                    before:content-['']
                                                                                                                                                                                    before:absolute
                                                                                                                                                                                    before:left-0
                                                                                                                                                                                    before:bottom-0
                                                                                                                                                                                    before:w-0
                                                                                                                                                                                    before:h-[2px]
                                                                                                                                                                                    before:bg-gray-600
                                                                                                                                                                                    before:transition-all
                                                                                                                                                                                    before:duration-300
                                                                                                                                                                                    before:ease-in-out
                                                                                                                                                                                    hover:before:w-full
                                                                                                                                                                                    text-[12px] md:text-[14px] 2xl:text-[16px]
                                                                                                                                                                                    whitespace-pre-line
                                                                                                                                                                                ">{{ $fileDownload->name }}
                                                        </span>
                                                    </a>
                                                </li>
                                            @else
                                                <h1 class="text-[14px] text-[#000]">Not Available!</h1>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="">
                                <h1
                                    class="{{ $functions->contains('model_id', $models->uuid) ? 'font-bold text-[16px] 2xl:text-[20px]' : 'hidden' }}">
                                    Technologies
                                </h1>

                                <div class="mt-5 w-full">
                                    <div class="flex flex-wrap items-center gap-2">
                                        @foreach ($functions as $function)
                                            <div x-data="{ open1: false }" class="relative">
                                                <a href="#" @click.prevent="open1 = 'true'">
                                                    <img loading="lazy" src="{{ $function->icon }}" alt="Video Icon"
                                                        class="w-9 2xl:w-12 h-9 2xl:h-12 rounded-full cursor-pointer hover:drop-shadow-lg hover:shadow-lg transition-all duration-150">
                                                </a>

                                                <!-- Video Popup Modal -->
                                                @if ($tech)
                                                    <div x-show="open1" x-cloak @keydown.escape.window="open1 = false"
                                                        @click.self="open1 = false"
                                                        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">

                                                        <div
                                                            class="bg-white pt-8 px-2 pb-2 rounded-lg shadow-lg relative w-full max-w-2xl sm:max-w-lg md:max-w-xl lg:max-w-2xl">
                                                            <button @click="open1 = false"
                                                                class="absolute top-2 right-3 text-black text-2xl">
                                                                <svg class="w-4 h-4 text-[#000]" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                    fill="none" viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M6 18 17.94 6M18 18 6.06 6" />
                                                                </svg>
                                                            </button>

                                                            <div
                                                                class="text-center pb-2 uppercase text-[20px] font-[600] tracking-wider">
                                                                <h1>{{ $function->name }}</h1>
                                                            </div>
                                                            <div class="relative w-full h-0 pb-[55%]">
                                                                @foreach ($tech as $item)
                                                                    @if ($function->uuid === $item->functions_id)
                                                                        <iframe class="absolute top-0 left-0 w-full h-full rounded-sm"
                                                                            src="{{ $item->link }}" frameborder="0" allowfullscreen>
                                                                        </iframe>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-5 mt-5">
                                <div {{ empty($daily) || empty($deep) ? 'hidden' : '' }}>
                                    <h1 class="text-[14px] 2xl:text-[20px] font-bold">
                                        Care & Maintenance
                                    </h1>
                                    <ul>
                                        <li>
                                            <div x-data="{ open2: false }"
                                                class="text-[12px] 2xltext-[16px] text-red-500 font-medium link">
                                                <a class="{{ empty($daily) ? 'hidden' : '' }}" href="#"
                                                    @click.prevent="open2 = true">
                                                    Daily Cleaning Video
                                                </a>

                                                <!-- Video Popup Modal -->
                                                <div x-show="open2" x-cloak @keydown.escape.window="open2 = false"
                                                    @click.self="open2 = false"
                                                    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">

                                                    <div
                                                        class="bg-white pt-8 px-2 pb-2 rounded-lg shadow-lg relative w-full max-w-2xl sm:max-w-lg md:max-w-xl lg:max-w-2xl">
                                                        <button @click="open2 = false"
                                                            class="absolute top-2 right-3 text-black text-2xl">
                                                            <svg class="w-4 h-4 text-[#000]" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M6 18 17.94 6M18 18 6.06 6" />
                                                            </svg>
                                                        </button>

                                                        <div class="relative w-full h-0 pb-[55%]">
                                                            @if (!empty($daily->video))
                                                                <iframe class="absolute top-0 left-0 w-full h-full rounded-sm"
                                                                    src="{{ $daily->video }}" frameborder="0" allowfullscreen>
                                                                </iframe>
                                                            @else
                                                                <h1 class="text-[14px] text-[#000]">Not Available!</h1>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div x-data="{ open3: false }"
                                                class="text-[12px] 2xltext-[16px] text-red-500 font-medium link">
                                                <a class="{{ empty($deep) ? 'hidden' : '' }}" href="#"
                                                    @click.prevent="open3 = true">
                                                    Deep Cleaning Video
                                                </a>

                                                <!-- Video Popup Modal -->
                                                <div x-show="open3" x-cloak @keydown.escape.window="open3 = false"
                                                    @click.self="open3 = false"
                                                    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">

                                                    <div
                                                        class="bg-white pt-8 px-2 pb-2 rounded-lg shadow-lg relative w-full max-w-2xl sm:max-w-lg md:max-w-xl lg:max-w-2xl">
                                                        <button @click="open3 = false"
                                                            class="absolute top-2 right-3 text-black text-2xl">
                                                            <svg class="w-4 h-4 text-[#000]" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M6 18 17.94 6M18 18 6.06 6" />
                                                            </svg>
                                                        </button>

                                                        <div class="relative w-full h-0 pb-[55%]">
                                                            @if (!empty($deep->video))
                                                                <iframe class="absolute top-0 left-0 w-full h-full rounded-sm"
                                                                    src="{{ $deep->video }}" frameborder="0" allowfullscreen>
                                                                </iframe>
                                                            @else
                                                                <h1 class="text-[14px] text-[#000]">Not Available!</h1>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        {{-- <li>
                                            <a href="{{ $deep->video }}"
                                                class="text-[12px] 2xltext-[16px] text-red-500 font-medium link">
                                                Deep Cleaning Video
                                            </a>
                                        </li> --}}
                                    </ul>
                                </div>
                                <div class="col-span-2">
                                    <h1
                                        class="{{ $awards->contains('model_id', $models->uuid) ? 'text-[14px] 2xl:text-[20px] font-bold' : 'hidden' }}">
                                        Awards
                                    </h1>
                                    <div class="flex flex-wrap w-full md:w-[500px] gap-1">
                                        @foreach ($awards as $award)
                                            @if ($award->model_id === $models->uuid && !empty($award->path))
                                                <img loading="lazy" src="{{ asset($award->path) }}" alt=""
                                                    class="w-20 2xl:w-32 object-contain object-center">
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- Sign Up Button -->
                            <div class="btn-signin relative top-[30px]">
                                <button id="openModalBtn"
                                    class="bg-[#000000] text-[#FFFFFF] w-[200px] h-[50px] hover:bg-[#333333] transition-colors">
                                    Quotation Request
                                </button>
                            </div>
                            <!-- Modal Background -->
                            <div id="signupModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

                                <!-- Modal Box -->
                                <div class="bg-white shadow-lg w-full max-w-md p-6 relative top-[60px]">

                                    <!-- Close Button -->
                                    <button id="closeModalBtn"
                                        class="absolute top-3 right-3 text-gray-500 hover:text-black text-xl">&times;</button>

                                    <p>Please fill in this form to create an account!</p>
                                    <form action="{{ route('signup.store') }}" method="POST" class="space-y-3">
                                        @csrf
                                        <!-- Full Name -->
                                        <div>
                                            <input type="text" name="full_name"
                                                class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black"
                                                placeholder="Full Name">
                                        </div>

                                        <!-- Company/Firm Name -->
                                        <div>
                                            <input type="text" name="company"
                                                class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black"
                                                placeholder="Company/Firm Name">
                                        </div>

                                        <!-- Position/Title -->
                                        <div>
                                            <input type="text" name="position"
                                                class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black"
                                                placeholder="Position/Title">
                                        </div>

                                        <!-- Phone Number / Telegram -->
                                        <div>
                                            <input type="text" name="phone"
                                                class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black"
                                                placeholder="Phone Number / Telegram">
                                        </div>

                                        <!-- Email Address -->
                                        <div>
                                            <input type="email" name="email"
                                                class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black"
                                                placeholder="Email Address">
                                        </div>

                                        <!-- Project Specialty -->
                                        <div>
                                            <select name="specialty"
                                                class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black text-gray-600">
                                                <option value="" disabled selected>Project Specialty</option>
                                                <option value="Residential">Residential</option>
                                                <option value="Commercial">Commercial</option>
                                                <option value="Hospitality">Hospitality</option>
                                                <option value="Industrial">Industrial</option>
                                            </select>
                                        </div>

                                        <!-- How did you hear about this event? -->
                                        <div>
                                            <select name="heard_from"
                                                class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black text-gray-600">
                                                <option value="" disabled selected>How did you hear about us ?
                                                </option>
                                                <option value="Facebook">Facebook</option>
                                                <option value="Telegram">Telegram</option>
                                                <option value="Invitation">Invitation</option>
                                                <option value="Friend">Friend</option>
                                                <option value="Supplier">Supplier</option>
                                            </select>
                                        </div>

                                        <!-- Consent -->
                                        <div class="flex items-start gap-2">
                                            <input type="checkbox" id="consent" name="consent" class="mt-1">
                                            <label for="consent" class="text-sm text-gray-700">
                                                I agree to receive event details and updates from Sun Hour Professional
                                                Team.
                                            </label>
                                        </div>
                                        <!-- Submit Button -->
                                        <button type="submit"
                                            class="w-full bg-[#000000] text-white py-2 hover:bg-[#333333] transition-colors">
                                            Quotation Request
                                        </button>
                                        @if(session('success'))
                                            <div class="mb-4 p-3 bg-green-100 text-green-800 border border-green-300">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .tab-link {
            border: 1px solid #000;
        }

        .tab-link.active {
            background-color: #000;
            color: #fff;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session("success") }}',
                confirmButtonColor: '#000',
                timer: 2000
            });
        </script>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabLinks = document.querySelectorAll('.tab-link');
            const tabContents = document.querySelectorAll('.tab-content');

            tabLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault(); // Prevent default anchor behavior

                    // Remove 'active' class from all tab links
                    tabLinks.forEach(tab => {
                        tab.classList.remove('active');
                    });

                    // Add 'active' class to the clicked tab link
                    link.classList.add('active');

                    // Remove 'active' class from all tab contents
                    tabContents.forEach(content => {
                        content.classList.remove('active');
                        content.classList.add('hidden');
                    });

                    // Get the target tab ID from the href
                    const targetId = link.getAttribute('href').substring(1); // Remove the '#'
                    const targetContent = document.getElementById(targetId);

                    // Show the target tab content
                    targetContent.classList.remove('hidden');
                    targetContent.classList.add('active');
                });
            });
        });
    </script>
    <!-- JavaScript -->
    <script>
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const signupModal = document.getElementById('signupModal');

        openModalBtn.addEventListener('click', () => {
            signupModal.classList.remove('hidden');
            signupModal.classList.add('flex');
        });

        closeModalBtn.addEventListener('click', () => {
            signupModal.classList.add('hidden');
        });

        // Close modal when clicking outside of it
        signupModal.addEventListener('click', (e) => {
            if (e.target === signupModal) {
                signupModal.classList.add('hidden');
            }
        });
    </script>
@endsection