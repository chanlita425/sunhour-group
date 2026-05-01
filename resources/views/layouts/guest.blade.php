<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta_tag')
    <!-- Preload critical assets -->
    <link rel="preload" href="{{ asset('logos.png') }}" as="image">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js" as="script">
    {{--
    <link rel="canonical" href="https://sunhourgroup.com.kh/all/brands"> --}}
    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="shortcut icon" href="{{ asset('logos.png') }}" type="image/x-icon">

    {{-- CORRECT WAY (Laravel-safe & SEO-safe) --}}
    @php
        $path = request()->path(); // en/articles
        $path = preg_replace('#^(en|km)/#', '', $path); // articles
    @endphp

    <link rel="alternate" hreflang="en" href="{{ url('en/' . $path) }}">
    <link rel="alternate" hreflang="km" href="{{ url('km/' . $path) }}">
    <link rel="alternate" hreflang="x-default" href="{{ url('en/' . $path) }}">

    {{-- Extra Improvement (Optional but Pro-Level) --}}
    <link rel="canonical" href="{{ url(app()->getLocale() . '/' . $path) }}">



    <!-- Kantumruy Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

    @vite('resources/css/app.css')
    <style>
        /* hide x-cloak elements until Alpine shows them */
        [x-cloak] {
            display: none !important;
        }

        .kantumruy {
            font-family: "Kantumruy Pro", sans-serif;
        }

        .inter {
            font-family: "Inter", sans-serif;
        }
    </style>

</head>

<body style="box-sizing: border-box;" class="max-w-[2048px] mx-auto bg-white text-gray-900 overflow-hidden {{ app()->getLocale() === 'en' ? 'inter' : 'kantumruy' }}">
    @yield('content')
</body>

</html>
