<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.meta')
    <title>{{ config('app.name', 'SeaCatering') }}</title>

    {{-- Favicon --}}
    <link rel="apple-touch-icon" href="{{ asset('images/logo.svg') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo.svg') }}" type="image/x-icon">

    {{-- Before Style Stack (tambahan sebelum style utama jika ada) --}}
    @stack('before-style')

    {{-- Style Includes --}}
    @include('includes.style')

    {{-- After Style Stack --}}
    @stack('after-style')

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- Poppins & Playfair Display --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    {{-- Scripts (Vite) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://unpkg.com/flowbite@2.3.0/dist/flowbite.min.js"></script>
</head>
<body class="flex items-center lg:justify-center flex-col bg-[#FFF0DC] min-h-screen antialiased">

    {{-- Header --}}
    @include('includes.header')

    {{-- Main content --}}
    <main class="w-full">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('includes.footer')

    {{-- Scripts --}}
    @stack('before-script')

    @include('includes.scripts')
    
    @stack('after-script')

</body>
</html>
