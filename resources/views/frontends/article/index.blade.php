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
    <div class="grid m-0 p-0 h-screen overflow-x-hidden scroll-smooth gap-y-10">

        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

        <section id="articles" class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 relative top-[60px]">

                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900">
                        {{ app()->getLocale() === 'en'
                            ? 'Our Recent Articles'
                            : (app()->getLocale() === 'km'
                                ? 'អត្ថបទថ្មីៗរបស់យើងខ្ញុំ'
                                : 'Our Recent Articles') }}
                    </h2>
                    <p class="mt-2 text-lg text-gray-600">
                        {{ app()->getLocale() === 'en'
                            ? 'Stay Informed With Our Latest Insights'
                            : (app()->getLocale() === 'km'
                                ? 'តាមដានព័ត៌មានថ្មីៗជាមួយនឹងការយល់ដឹងថ្មីៗរបស់យើងខ្ញុំ'
                                : 'Stay Informed With Our Latest Insights') }}
                    </p>
                </div>

                @php
                    $featuredArticle = $articles->first();
                    $otherArticles = $articles->skip(1);

                    // dd($otherArticles);

                @endphp

                @if ($featuredArticle)
                    <div class="mb-12 flex flex-col lg:flex-row items-center space-y-6 lg:space-y-0 lg:space-x-8">
                        <div class="lg:w-2/5">
                            <img src="{{ asset('uploads/articles/' . $featuredArticle->photo) }}"
                                alt="{{ $featuredArticle->title }}"
                                class="h-64 w-full object-contain rounded-lg bg-[#FFFFFF]">
                        </div>
                        <div class="lg:w-3/5">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">
                                {{-- {{ $featuredArticle->reading_time ?? '5 min read' }} --}}
                                {{ app()->getLocale() === 'en' ? '5 min read' : (app()->getLocale() === 'km' ? 'អាន ៥ នាទី' : '5 min read') }}
                            </span>
                            <h3 class="text-3xl font-extrabold text-gray-900 mb-4">
                                {{ app()->getLocale() === 'en'
                                    ? $featuredArticle->title
                                    : (app()->getLocale() === 'km'
                                        ? $featuredArticle->title_kh
                                        : $featuredArticle->title_cn) }}
                            </h3>
                            <p class="text-gray-600 mb-6 line-clamp-3">
                                {{ app()->getLocale() === 'en'
                                    ? $featuredArticle->subtitle
                                    : (app()->getLocale() === 'km'
                                        ? $featuredArticle->subtitle_kh
                                        : $featuredArticle->subtitle_cn) }}
                            </p>
                            <a href="{{ route('articles.show', [
                                'locale' => app()->getLocale(),
                                'slug' => $featuredArticle->slug
                            ]) }}"
                            class="text-blue-600 hover:text-blue-800 font-semibold transition duration-150 ease-in-out flex items-center">
                                {{ app()->getLocale() === 'en' ? 'Read More' : 'ព័ត៌មានបន្ថែម' }}
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">

                    @forelse ($otherArticles as $article)
                        <div class="bg-white border overflow-hidden flex flex-col h-full">

                            <img src="{{ asset('uploads/articles/' . $article->photo) }}" alt="{{ $article->title }}"
                                class="h-48 w-full object-cover">

                            <div class="p-6 flex flex-col flex-grow">
                                @php
                                    $month = $article->created_at->format('M');
                                    $day = $article->created_at->format('d');
                                    $year = $article->created_at->format('Y');

                                    $month = __('date.months.' . $month);
                                @endphp
                                <p class="text-sm text-gray-500 mb-1">
                                    {{ "$day $month, $year" }}
                                </p>

                                <h4 class="font-bold text-xl text-gray-900 mb-3 line-clamp-2">
                                    {{-- {{ $article->title }} --}}
                                    {{ app()->getLocale() === 'en'
                                        ? $article->title
                                        : (app()->getLocale() === 'km'
                                            ? $article->title_kh
                                            : $article->title_cn) }}
                                </h4>

                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                    {{-- {{ $article->subtitle }} --}}
                                    {{ app()->getLocale() === 'en'
                                        ? $article->subtitle
                                        : (app()->getLocale() === 'km'
                                            ? $article->subtitle_kh
                                            : $article->subtitle_cn) }}
                                </p>

                                <div class="mt-auto">
                                    <a href="{{ route('articles.show', [
                                        'locale' => app()->getLocale(),
                                        'slug' => $article->slug
                                    ]) }}"
                                    class="text-blue-600 hover:text-blue-800 font-semibold transition duration-150 ease-in-out flex items-center">
                                        {{ app()->getLocale() === 'en' ? 'Read More' : 'ព័ត៌មានបន្ថែម' }}
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                        </div>
                    @empty
                        <div class="col-span-3 text-center py-10 text-gray-500">
                            No articles found.
                        </div>
                    @endforelse

                </div>

        </section>
        <footer class="absolute inset-x-0 bottom-0 bg-black py-1 z-[50]">
            <p class="text-white text-[12px] text-center"> © Copyright 2024 SUNHOUR GROUP, All Rights Reserved</p>
        </footer>
    </div>
@endsection
