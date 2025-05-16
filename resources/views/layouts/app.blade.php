<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Laravel Vercel App')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            {{-- Fallback for environments where Vite manifest/hot file isn't available --}}
            {{-- This might not be strictly necessary for Vercel if 'npm run build' always runs --}}
        @endif
    </head>
    <body class="font-sans bg-gray-100 text-gray-800 antialiased">
        <div class="max-w-3xl my-8 mx-auto p-8 bg-white rounded-lg shadow-md">
            <nav class="mb-6 pb-4 border-b border-gray-200">
                <a href="{{ route('home') }}" class="mr-4 text-blue-600 hover:text-blue-800 hover:underline font-medium">Home</a>
                <a href="{{ route('db-test') }}" class="mr-4 text-blue-600 hover:text-blue-800 hover:underline font-medium">DB Test</a>
                <a href="{{ route('ping') }}" class="text-blue-600 hover:text-blue-800 hover:underline font-medium">Ping</a>
            </nav>

            {{-- Content will have its own h1, p tags styled by Tailwind's preflight or specific classes --}}
            @yield('content')

        </div>
    </body>
</html>
