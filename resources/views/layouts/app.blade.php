<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- SEO --}}
    <title>@yield('meta_title', config('app.name', 'Sunhour Group Co., Ltd'))</title>

    <meta name="description"
        content="@yield('meta_description', 'Sun Hour Group Cambodia Admin Panel')">

    {{-- Admin should NOT index --}}
    <meta name="robots" content="noindex, nofollow">

    <meta name="theme-color" content="#ffffff">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ request()->url() }}">

    {{-- hreflang --}}
    @php
        $path = preg_replace('#^(en|km)/#', '', request()->path());
    @endphp

    <link rel="alternate" hreflang="en" href="{{ url('en/' . $path) }}">
    <link rel="alternate" hreflang="km" href="{{ url('km/' . $path) }}">
    <link rel="alternate" hreflang="x-default" href="{{ url('en/' . $path) }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:title"
        content="@yield('meta_title', config('app.name', 'Sunhour Group Co., Ltd'))">

    <meta property="og:description"
        content="@yield('meta_description', 'Sun Hour Group Cambodia Admin Panel')">

    <meta property="og:image"
        content="@yield('meta_image', asset('logos.png'))">

    <meta property="og:url" content="{{ request()->url() }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:title"
        content="@yield('meta_title', config('app.name', 'Sunhour Group Co., Ltd'))">

    <meta name="twitter:description"
        content="@yield('meta_description', 'Sun Hour Group Cambodia Admin Panel')">

    <meta name="twitter:image"
        content="@yield('meta_image', asset('logos.png'))">

    {{-- Structured Data --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Sunhour Group Co., Ltd",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('logos.png') }}"
    }
    </script>

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('logos.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('logos.png') }}">

    {{-- Performance --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://www.googletagmanager.com">

    {{-- Fonts --}}
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600"
        rel="stylesheet" />

    {{-- Scripts --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Google Analytics --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-G30N5Q6QJW"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-G30N5Q6QJW', {
            send_page_view: true
        });
    </script>

    {{-- Vite --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200 text-gray-900">

    <div class="hidden lg:grid grid-cols-12 transition-all duration-300" id="content">

        {{-- Sidebar --}}
        <aside id="sidebar"
            class="col-span-2 flex flex-col justify-between w-full bg-gray-800 shadow-md p-4 min-h-screen">

            <div>

                {{-- Logo --}}
                <a id="logo"
                    href="{{ route('dashboard.index') }}"
                    class="flex items-center gap-2"
                    aria-label="Dashboard Home">

                    <img src="{{ asset('Logo_white.png') }}"
                        alt="Sunhour Group Logo"
                        class="w-[90px] rounded-full">
                </a>

                {{-- Navigation --}}
                <div>
                    <ul class="mt-8 text-gray-100 flex flex-col space-y-3">

                        {{-- Dashboard --}}
                        <li>
                            <a href="{{ route('dashboard.index') }}"
                                aria-label="Dashboard"
                                class="flex items-center gap-2 hover:bg-gray-500 {{ Route::is('dashboard.*') ? 'bg-gray-500' : '' }}
                                rounded-full transition-all duration-300 px-4 py-1">

                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        width="24"
                                        height="24"
                                        stroke-width="1.25">
                                        <path d="M5 4h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1"></path>
                                        <path d="M5 16h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1"></path>
                                        <path d="M15 12h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1"></path>
                                        <path d="M15 4h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1"></path>
                                    </svg>
                                </span>

                                <span>Dashboard</span>
                            </a>
                        </li>

                        {{-- Brands --}}
                        <li>
                            <a href="{{ route('brands.index') }}"
                                aria-label="Brands"
                                class="flex items-center gap-2 hover:bg-gray-500 {{ Route::is('brands.*') ? 'bg-gray-500' : '' }}
                                rounded-full transition-all duration-300 px-4 py-1">

                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        width="24"
                                        height="24"
                                        stroke-width="1.25">
                                        <path d="M19 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M19 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M5 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M7 12h3l3.5 6h3.5"></path>
                                        <path d="M17 6h-3.5l-3.5 6"></path>
                                    </svg>
                                </span>

                                <span>Brands</span>
                            </a>
                        </li>

                        {{-- FAQs --}}
                        <li>
                            <a href="{{ route('faqs.index') }}"
                                aria-label="FAQs"
                                class="flex items-center gap-2 hover:bg-gray-500 {{ Route::is('faqs.*') ? 'bg-gray-500' : '' }}
                                rounded-full transition-all duration-300 px-4 py-1">

                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M9.09 9a3 3 0 1 1 5.83 1c-.33 1.33-1.83 2-2.92 2"></path>
                                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                    </svg>
                                </span>

                                <span>FAQs</span>
                            </a>
                        </li>

                        {{-- Articles --}}
                        <li>
                            <a href="{{ route('article.index') }}"
                                aria-label="Articles"
                                class="flex items-center gap-2 hover:bg-gray-500 {{ Route::is('article.*') ? 'bg-gray-500' : '' }}
                                rounded-full transition-all duration-300 px-4 py-1">

                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <line x1="10" y1="9" x2="8" y2="9"></line>
                                    </svg>
                                </span>

                                <span>Article</span>
                            </a>
                        </li>

                        {{-- Quotation --}}
                        <li>
                            <a href="{{ route('signup.index') }}"
                                aria-label="Quotation Request"
                                class="flex items-center gap-2 hover:bg-gray-500 {{ Route::is('signup.*') ? 'bg-gray-500' : '' }}
                                rounded-full transition-all duration-300 px-4 py-1">

                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                    </svg>
                                </span>

                                <span>Quotation Request</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            {{-- Footer --}}
            <div class="flex flex-col space-y-4">

                {{-- Profile --}}
                <a href="{{ route('profile') }}"
                    class="text-white hover:bg-gray-500 {{ Route::is('profile') ? 'bg-gray-500' : '' }}
                    rounded-full w-full px-4 py-1 flex items-center gap-2">

                    <span>Profile</span>
                </a>

                {{-- Logout --}}
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                        class="flex items-center gap-2 w-full px-4 py-1 hover:bg-gray-500 rounded-full text-white">

                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main --}}
        <main id="main" class="col-span-10 p-5 overflow-y-auto">

            <h1 class="text-3xl font-bold mb-5">
                @yield('title')
            </h1>

            @yield('content')
        </main>
    </div>

    {{-- Mobile --}}
    <div class="xl:hidden bg-warning/20">
        <div class="flex items-center justify-center min-h-screen px-5 text-center">
            <h1 class="text-2xl font-bold text-warning">
                Admin panel is currently optimized for desktop view.
            </h1>
        </div>
    </div>

</body>

</html>