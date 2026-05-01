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

    <style>
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

        <div class="w-full max-w-7xl mx-auto h-[100vh] flex flex-col pt-32 overflow-y-auto hide-scrollbar">

            <div class="bg-white w-full min-h-[30vh] md:min-h-[50vh]">
                <img src="{{ asset('uploads/articles/' . $article->photo) }}" alt="{{ $article->title }}"
                    class="h-full w-full object-contain">
            </div>

            <div class="p-6 flex flex-col flex-grow">
                @php
                    $month = $article->created_at->format('M');
                    $day = $article->created_at->format('d');
                    $year = $article->created_at->format('Y');

                    $month = __('date.months.' . $month);
                @endphp
                <p class="text-[14px] md:text-[16px] text-gray-500 mb-1">
                    {{ "$day $month, $year" }}
                </p>

                <h4 class="font-bold text-[16px] md:text-[20px] text-gray-900 mb-2">
                    {{ app()->getLocale() === 'en'
                        ? $article->title
                        : (app()->getLocale() === 'km'
                            ? $article->title_kh
                            : $article->title_cn) }}
                </h4>

                <p class="text-gray-600 text-[14px] md:text-[16px] mb-4">
                    {{ app()->getLocale() === 'en'
                        ? $article->subtitle
                        : (app()->getLocale() === 'km'
                            ? $article->subtitle_kh
                            : $article->subtitle_cn) }}
                </p>

                <p class="text-gray-600 text-sm mb-4">
                    {!! app()->getLocale() === 'en'
                        ? $article->description
                        : (app()->getLocale() === 'km'
                            ? $article->description_kh
                            : $article->description_cn) !!}
                </p>

                <div class="mt-5">
                    <a href="{{ route('articles', ['locale' => app()->getLocale()]) }}" class="text-black border border-blue-800 px-6 py-2 rounded-sm hover:bg-blue-800 hover:text-[#fff] duration-300 transition-all font-medium">
                        {{ app()->getLocale() === 'en' ? 'Back' : (app()->getLocale() === 'km' ? 'ថយក្រោយ' : 'Back') }}
                    </a>
                </div>

            </div>

        </div>
    
@endsection
