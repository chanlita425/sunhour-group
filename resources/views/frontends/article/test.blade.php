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
    <div class="grid m-0 p-0 h-screen overflow-x-hidden scroll-smooth gap-y-10 font-['Inter']">

        <!-- Articles Section -->

        <!-- Alpine.js (only once!) -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
        <section id="articles" class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative top-[60px]">

                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900">Our Recent Articles</h2>
                    <p class="mt-2 text-lg text-gray-600">Stay Informed With Our Latest Insights</p>
                </div>

                {{-- **Featured Article (Correct ID: article-pos) - No Change Needed Here** --}}
                <div class="mb-12 flex flex-col lg:flex-row items-center space-y-6 lg:space-y-0 lg:space-x-8">
                    <div class="lg:w-2/5">
                        <div class="h-64 w-full bg-purple-100 flex">
                        </div>
                    </div>
                    <div class="lg:w-3/5">
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">
                            5 min read
                        </span>
                        <h3 class="text-xl font-extrabold text-gray-900 mb-4">
                            Unlocking Efficiency
                        </h3>
                        <p class="text-gray-600 mb-6">
                            In today's fast-paced business landscape, efficiency is key to success. From
                            small local shops to large retail enterprises, businesses are constantly
                            seeking ways to streamline their operations and enhance customer experience.
                        </p>
                        <button onclick="showArticleModal(this)" data-image="/assets/article1.jpg"
                            data-title="Unlocking Efficiency: The Power Of A Modern POS System"
                            data-subtitle="How POS technology transforms business operations" data-date="20 Apr, 2024"
                            data-content="Full content goes here... you will load from backend later"
                            data-description="All description"
                            class="text-blue-600 hover:text-blue-800 font-semibold transition duration-150 ease-in-out flex items-center">
                            Read More
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                    {{-- **Article 1 (Now ID: article-qr)** --}}
                    <div class="hover:shadow-2xl transition duration-300 overflow-hidden">
                        <div class="h-48 w-full bg-purple-100 flex items-center justify-center">
                        </div>
                        <div class="p-6">
                            <p class="text-sm text-gray-500 mb-1">20 Apr, 2024</p>
                            <h4 class="font-bold text-xl text-gray-900 mb-3 line-clamp-2">
                                Beyond Transactions: Unlocking the Full Potential of Your POS System
                            </h4>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                In the realm of modern business operations, a Point of Sale (POS) system is now as critical
                                as the cash register...
                            </p>
                            <button onclick="showArticleModal(this)" data-image="/assets/article1.jpg"
                                data-title="Unlocking Efficiency: The Power Of A Modern POS System"
                                data-subtitle="How POS technology transforms business operations" data-date="20 Apr, 2024"
                                data-content="Full content goes here... you will load from backend later"
                                data-description="All description"
                                class="text-blue-600 hover:text-blue-800 font-medium">
                                Read More
                            </button>

                        </div>
                    </div>

                    {{-- **Article 2 (Now ID: article-brick)** --}}
                    <div class="hover:shadow-2xl transition duration-300 overflow-hidden">
                        <div class="h-48 w-full bg-purple-100 flex items-center justify-center">
                        </div>
                        <div class="p-6">
                            <p class="text-sm text-gray-500 mb-1">10 Apr, 2024</p>
                            <h4 class="font-bold text-xl text-gray-900 mb-3 line-clamp-2">
                                From Brick-and-Mortar to Online Storefront: Integrating...
                            </h4>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                In the realm of modern business operations, a Point of Sale (POS) system is now as critical
                                as the cash register...
                            </p>
                            <button onclick="showArticleModal(this)" data-image="/assets/article1.jpg"
                                data-title="Unlocking Efficiency: The Power Of A Modern POS System"
                                data-subtitle="How POS technology transforms business operations" data-date="20 Apr, 2024"
                                data-content="Full content goes here... you will load from backend later"
                                data-description="All description"
                                class="text-blue-600 hover:text-blue-800 font-medium">
                                Read More
                            </button>

                        </div>
                    </div>

                    {{-- **Article 3 (Now ID: article-security)** --}}
                    <div class="hover:shadow-2xl transition duration-300 overflow-hidden">
                        <div class="h-48 w-full bg-purple-100 flex items-center justify-center">
                        </div>
                        <div class="p-6">
                            <p class="text-sm text-gray-500 mb-1">01 Apr, 2024</p>
                            <h4 class="font-bold text-xl text-gray-900 mb-3 line-clamp-2">
                                Security First: Protecting Your Business with Advanced POS System
                            </h4>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                One of the primary functions of a POS system is to process payments and handle sensitive
                                customer data...
                            </p>
                            <button onclick="showArticleModal(this)" data-image="/assets/article1.jpg"
                                data-title="Unlocking Efficiency: The Power Of A Modern POS System"
                                data-subtitle="How POS technology transforms business operations" data-date="20 Apr, 2024"
                                data-content="Full content goes here... you will load from backend later"
                                data-description="All description"
                                class="text-blue-600 hover:text-blue-800 font-medium">
                                Read More
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Hidden Article Details -->
            <!-- Article Detail Modal -->
            <div id="article-modal" class="fixed inset-0 hidden bg-black bg-opacity-50 z-[999] p-4">
                <div class="bg-white max-w-3xl mx-auto mt-16 p-6 rounded-lg shadow-xl relative">

                    <!-- Close Button -->
                    <button id="closeModal"
                        class="absolute top-3 right-3 px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">
                        ✕
                    </button>

                    <!-- Article Image -->
                    <img id="modal-image" src="" alt="Article Image" class="w-full h-64 object-cover rounded-lg mb-4">

                    <!-- Title -->
                    <h2 id="modal-title" class="text-3xl font-bold mb-1"></h2>

                    <!-- Subtitle -->
                    <h3 id="modal-subtitle" class="text-xl text-gray-700 font-medium mb-2"></h3>

                    <!-- Date -->
                    <p id="modal-date" class="text-gray-500 text-sm mb-4"></p>

                    <!-- Content -->
                    <p id="modal-content" class="text-gray-700 leading-relaxed whitespace-pre-line"></p>
                    <p id="model-description" class="text-gray-700 leading-relaxed whitespace-pre-line"></p>

                </div>
            </div>



        </section>
        <footer class="absolute inset-x-0 bottom-0 bg-black py-1 z-[50]">
            <p class="text-white text-[12px] text-center"> © Copyright 2024 SUNHOUR GROUP, All Rights Reserved</p>
        </footer>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const modal = document.getElementById("article-modal");
            const closeBtn = document.getElementById("closeModal");

            window.showArticleModal = function (el) {
                document.getElementById("modal-image").src = el.dataset.image;
                document.getElementById("modal-title").innerText = el.dataset.title;
                document.getElementById("modal-subtitle").innerText = el.dataset.subtitle;
                document.getElementById("modal-date").innerText = el.dataset.date;
                document.getElementById("modal-content").innerText = el.dataset.content;
                document.getElementById("model-description").innerText = el.dataset.description;

                modal.classList.remove("hidden");
            };

            closeBtn.addEventListener("click", () => modal.classList.add("hidden"));

            modal.addEventListener("click", (e) => {
                if (e.target === modal) modal.classList.add("hidden");
            });
        });
    </script>


@endsection