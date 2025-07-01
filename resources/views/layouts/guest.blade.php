<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta_tag')
    <!-- Preload critical assets -->
    <link rel="preload" href="{{ asset('logos.png') }}" as="image">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js" as="script">

    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="shortcut icon" href="{{ asset('logos.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Ponomar&display=swap"
        rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

    @vite('resources/css/app.css')
    
</head>

<body style="box-sizing: border-box;" class="max-w-[2048px] mx-auto bg-white text-gray-900 overflow-hidden">
    @yield('content')
</body>

</html>
