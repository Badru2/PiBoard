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

    {{-- Styles --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-centerpt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900" style="background-color: #021F35">
        <div class="w-2/5 grid min-h-screen content-center">
            <div class="container ms-4">
                <img style="color: " src="{{ asset('icon_white.svg') }}" alt="" srcset="">
                <div class="my-3" style="width: 200px; height: 10px; background-color: #C70039; border-radius: 10px"></div>
                <h2 class="text-white text-3xl font-bold">Selamat Datang Di <h2 class="text-white text-3xl font-bold">PI Board</h2>
                </h2>
            </div>
        </div>
        <div class="w-3/5 grid content-center absolute right-0 h-full"
            style="background-color: #4AB6FF; height: 100vh; border-left: 6px solid #C70039; justify-content:center">
            <div class=" sm:max-w-md px-12 py-5
             place-content-center container bg-white dark:bg-gray-800
             shadow-md sm:rounded-lg"
                style="border: 3px solid #C70039">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
