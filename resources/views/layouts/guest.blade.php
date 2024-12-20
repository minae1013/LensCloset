<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen bg-cover bg-center relative" style="background-image: url('/img/home_background.jpg');">
            <div class="absolute inset-0 bg-black opacity-50 z-10"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center z-20 space-y-6">
                    <h2 class="text-7xl text-white font-semibold">
                        LENS CLOSET
                    </h2>
                    {{ $slot }}
                </div>
        </div>
    </body>
</html>
