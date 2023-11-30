<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    {{-- Styles --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        img {
            pointer-events: none;
            user-select: none;
        }
    </style>
</head>

<body class="font-sans antialiased dark:bg-gray-900">
    <div class="min-h-screen dark:bg-gray-900 ">
        {{-- @include('layouts.navigation') --}}

        @include('components.sidebar-left')

        @include('components.sidebar-right')

        <!-- Page Content -->
        <main class="mx-auto">
            {{-- @include('sweetalert::alert') --}}
            {{ $slot }}
        </main>
    </div>

    <script>
        // Like Feature
        function like(id, el) {
            fetch('/like/' + id)
                .then(response => response.json())
                .then(data => {
                    if (data.status == 'LIKE') {
                        el.innerHTML =
                            '<iconify-icon icon="material-symbols-light:favorite"></iconify-icon>';
                    } else {
                        el.innerHTML =
                            '<div class="text-danger"><iconify-icon icon="material-symbols:favorite-outline"></iconify-icon></div>';
                    }
                });
        }

        // Hashtag Feature
        document.querySelectorAll(".captions").forEach(function(el) {
            let renderedText = el.innerHTML.replace(/#(\w+)/g,
                "<a href='search?search=%23$1' style='color: #00A9FF; text-decoration: underline'>#$1</a>");
            el.innerHTML = renderedText;
        });

        // Follow Button
        function follow(id, el) {
            fetch('/follow/' + id).then(response => response.json()).then(data => {
                el.innerText = (data.status == "FOLLOW") ? 'unfollow' : 'follow'
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

</body>

</html>
