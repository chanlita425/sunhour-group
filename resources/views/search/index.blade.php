@extends('layouts.guest')

@section('content')
    {{-- Navbar --}}
    @component('components.navbar')
    @endcomponent

    {{-- Loading Overlay --}}
    <div id="searchLoading" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-xl flex flex-col items-center">
            <div class="animate-spin rounded-full h-16 w-16 border-4 border-gray-200 border-t-gray-900 mb-4"></div>
            <p class="text-gray-700 text-lg font-medium">Searching...</p>
        </div>
    </div>

    <div id="searchContent" class="p-0 overflow-x-hidden scroll-smooth h-screen">
        <div class="w-full max-w-screen-xl mx-auto mt-[5rem] xl:mt-[10rem] px-3 md:px-5">
            <video autoplay muted loop playsinline preload="auto" loading="lazy" class="w-full h-[40vh] object-cover">
                <source src="{{ asset('videos/bg_about_us.mp4') }}" type="video/mp4">
            </video>
        </div>
        <div class="w-full max-w-screen-xl mx-auto px-3 md:px-5">
            <h1 class="text-black text-2xl font-medium font-['Inter'] my-[3rem]">
                @if ($singleModel && $products)
                    Search found for "{{ $search }}"
                @elseif($search)
                    Search not found for "{{ $search }}"
                @endif
            </h1>

            <div
                class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-5 justify-center xl:justify-start gap-[10px] md:gap-[15px] pb-[10rem]">
                @if ($singleModel && $products && $brands)
                    {{-- @foreach ($model as $models)
                        @if (!empty($models->link) && !empty($models->name))
                            <a href="{{ route('brands-client.model-details', [$models->products->brands->slug, $models->products->slug, $models->uuid]) }}"
                                class="w-full hover:shadow-sm hover:scale-[1.01] transition-all duration-150 overflow-hidden">
                                <article
                                    class="flex flex-col justify-between bg-white w-full {{ $brands->uuid == 'bXRMSTQ3OC0y' || $brands->uuid == 'ZG56bDFzUS00' ? 'h-full' : 'h-[440px]' }} border-2 border-gray-200">
                                    <div class="w-full relative px-2 py-4">
                                        <h1
                                            class="max-w-[150px] text-md 2xl:text-lg font-medium mb-3 2xl:mb-7 min-h-[50px] whitespace-normal break-words">
                                            {{ $models->name }}
                                        </h1>
                                            // <div class="max-w-[150px] text-sm 2xl:text-lg font-light mb-1 capitalize">
                                            //    <p>{{ $products->uuid == $models->product_id ? $products->name : '' }}</p>
                                             // </div>
                                        <div
                                            class="{{ $models->products->uuid !== 'MHFMay0zMjM5OTI=' ? 'hidden' : '' }} absolute top-[7.5%] right-2">
                                            <span class="font-medium text-red-600 px-2 py-[2px] text-[18px]">
                                                New
                                            </span>
                                        </div>
                                    </div>
                                    <div class="w-[180px] mx-auto">
                                        <img loading="lazy" src="{{ $models->link }}" alt="{{ $models->name }}"
                                            class="w-full h-full object-contain object-center pb-5">
                                    </div>
                                </article>
                            </a>
                        @endif
                    @endforeach --}}
                    @foreach ($model as $models)
                        @php
                            $product = $models->products;
                            $brand = $product ? $product->brands : null;
                        @endphp

                        @if ($product && $brand && !empty($models->link) && !empty($models->name))
                            <a href="{{ route('brands-client.model-details', [
                                $brand->slug,
                                $product->slug,
                                $models->uuid
                            ]) }}"
                                class="w-full hover:shadow-sm hover:scale-[1.01] transition-all duration-150 overflow-hidden">
                                <article
                                    class="flex flex-col justify-between bg-white w-full {{ $brands && ($brands->uuid == 'bXRMSTQ3OC0y' || $brands->uuid == 'ZG56bDFzUS00') ? 'h-full' : 'h-[440px]' }} border-2 border-gray-200">
                                    <div class="w-full relative px-2 py-4">
                                        <h1
                                            class="max-w-[150px] text-md 2xl:text-lg font-medium mb-3 2xl:mb-7 min-h-[50px] whitespace-normal break-words">
                                            {{ $models->name }}
                                        </h1>
                                        <div
                                            class="{{ $product->uuid !== 'MHFMay0zMjM5OTI=' ? 'hidden' : '' }} absolute top-[7.5%] right-2">
                                            <span class="font-medium text-red-600 px-2 py-[2px] text-[18px]">
                                                New
                                            </span>
                                        </div>
                                    </div>
                                    <div class="w-[180px] mx-auto">
                                        <img loading="lazy" src="{{ $models->link }}" alt="{{ $models->name }}"
                                            class="w-full h-full object-contain object-center pb-5">
                                    </div>
                                </article>
                            </a>
                        @endif
                    @endforeach


                    {{-- Pagination Links --}}
                    <div class="col-span-full mt-8">
                        <div class="flex justify-center">
                            {{ $model->appends(request()->query())->links('pagination::daisyui') }}
                        </div>
                    </div>
                @else
                    <div class="col-span-full text-center py-10">
                        <h2 class="text-xl text-gray-600">
                            @if ($search)
                                No results found for "{{ $search }}"
                            @else
                                Search not found!
                            @endif
                        </h2>
                        @if ($search)
                            <p class="text-gray-500 mt-2">Try different keywords or check your spelling</p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
        <footer class="absolute inset-x-0 bottom-0 bg-black py-1">
            <p class="text-white text-[12px] text-center"> © Copyright 2024 SUNHOUR GROUP, All Rights Reserved</p>
        </footer>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchForms = document.querySelectorAll('form[action*="search"]');
            const searchContent = document.getElementById('searchContent');
            const searchLoading = document.getElementById('searchLoading');

            function showLoading() {
                searchLoading.classList.remove('hidden');
                searchLoading.classList.add('flex');
                searchContent.classList.add('blur-sm');
            }

            function hideLoading() {
                searchLoading.classList.add('hidden');
                searchLoading.classList.remove('flex');
                searchContent.classList.remove('blur-sm');
            }

            // Handle search form submissions
            searchForms.forEach(form => {
                form.addEventListener('submit', showLoading);
            });

            // Handle pagination clicks
            document.addEventListener('click', function(e) {
                const paginationLink = e.target.closest('.pagination a');
                if (paginationLink) {
                    showLoading();
                }
            });

            // Hide loading state when page is fully loaded
            window.addEventListener('load', hideLoading);

            // Also hide loading if there's an error
            window.addEventListener('error', hideLoading);
        });
    </script>
@endsection
