<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale() == 'km' ? 'km' : 'en') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Sunhour Group Co., Ltd') }}</title>
    <link rel="shortcut icon" href="{{ asset('logos.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <!-- Styles / Scripts -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite('resources/css/app.css')

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

</head>

<body cz-shortcut-listen="true" class="bg-gray-200 text-gray-900 overflow-hidden">
    <div class="hidden lg:grid grid-cols-12 transition-all duration-300" id="content">
        <aside id="sidebar" class="col-span-2 flex flex-col justify-between w-full bg-gray-800 shadow-md p-4 h-screen">
            <div>
                <a id="logo" data-tip="Home" href="{{ route('dashboard.index') }}" class="flex items-center gap-2">
                    <img src="{{ asset('Logo_white.png') }}" alt="Logo" class="w-[90px] rounded-full">
                </a>
                <div>
                    <ul class="mt-8 text-gray-100 flex flex-col space-y-3">
                        <li>
                            <a data-tip="Dashboard" href="{{ route('dashboard.index') }}"
                                class="flex items-center gap-2 hover:bg-gray-500 {{ Route::is('dashboard.index') ? 'bg-gray-500' : '' }} rounded-full transition-all duration-300 px-4 py-1 listItem">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                                        height="24" stroke-width="1.25">
                                        <path
                                            d="M5 4h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1">
                                        </path>
                                        <path
                                            d="M5 16h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1">
                                        </path>
                                        <path
                                            d="M15 12h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1">
                                        </path>
                                        <path
                                            d="M15 4h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1">
                                        </path>
                                    </svg>
                                </span>
                                <p class="title">
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li>
                            <a data-tip="Home" href="{{ route('brands.index') }}"
                                class="flex items-center gap-2 hover:bg-gray-500 {{ Route::is('brands.index') ? 'bg-gray-500' : '' }} rounded-full transition-all duration-300 px-4 py-1 listItem">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                                        height="24" stroke-width="1.25">
                                        <path d="M19 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M19 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M5 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M7 12h3l3.5 6h3.5"></path>
                                        <path d="M17 6h-3.5l-3.5 6"></path>
                                    </svg>
                                </span>
                                <p class="title">
                                    Brands
                                </p>
                            </a>
                        </li>
                        <li>
                            <a data-tip="Home" href="{{ route('faqs.index') }}" class="flex items-center gap-2 hover:bg-gray-500 {{ Route::is('brands.index') ? 'bg-gray-500' : '' }}
                            rounded-full transition-all duration-300 px-4 py-1 listItem">

                                <span>
                                    <!-- FAQ Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M9.09 9a3 3 0 1 1 5.83 1c-.33 1.33-1.83 2-2.92 2"></path>
                                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                    </svg>
                                </span>

                                <p class="title">FAQs</p>
                            </a>
                        </li>
                        <li>
                            <a data-tip="Home" href="{{ route('article.index') }}" class="flex items-center gap-2 hover:bg-gray-500 {{ Route::is('brands.index') ? 'bg-gray-500' : '' }}
                            rounded-full transition-all duration-300 px-4 py-1 listItem">

                                <span>
                                    <!-- Article Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <line x1="10" y1="9" x2="8" y2="9"></line>
                                    </svg>
                                </span>

                                <p class="title">Article</p>
                            </a>
                        </li>
                        <li>
                            <a data-tip="Notification" href="{{ route('signup.index') }}" class="flex items-center gap-2 hover:bg-gray-500 {{ Route::is('brands.index') ? 'bg-gray-500' : '' }}
                                rounded-full transition-all duration-300 px-4 py-1 listItem">

                                <span>
                                    <!-- Notification Bell Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                    </svg>
                                </span>

                                <p class="title">Quotation Request</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- Profile and Logout --}}
            <div class="flex flex-col space-y-4">
                <a href="{{ route('profile') }}"
                    class="text-white hover:bg-gray-500 {{ Route::is('profile') ? 'bg-gray-500' : '' }} rounded-full w-full px-4 py-1 flex items-center justify-start gap-2">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="1">
                            <path d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z">
                            </path>
                            <path d="M10 16h6"></path>
                            <path d="M13 11m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M4 8h3"></path>
                            <path d="M4 12h3"></path>
                            <path d="M4 16h3"></path>
                        </svg>
                    </span>
                    <span>
                        Profile
                    </span>
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex items-center justify-start gap-2 w-full px-4 py-1 hover:bg-gray-500 rounded-full text-gray-800">
                        <span class="text-white text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                                height="24" stroke-width="1">
                                <path
                                    d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2">
                                </path>
                                <path d="M15 12h-12l3 -3"></path>
                                <path d="M6 15l-3 -3"></path>
                            </svg>
                        </span>
                        <span class="text-white rounded-full text-[16px] font-[400]">
                            Logout
                        </span>
                    </button>
                </form>
            </div>
        </aside>
        <main id="main" class="col-span-10 p-5">
            <h1 class="text-3xl font-bold underline">
                @yield('title')
            </h1>
            @yield('content')
        </main>
    </div>
    <div class="xl:hidden bg-warning/20 transition-all duration-300">
        <div class="flex items-center justify-center h-screen">
            <h1 class="text-2xl font-bold text-warning">
                Not available on mobile and tablet
            </h1>
        </div>
    </div>

</body>

</html>
