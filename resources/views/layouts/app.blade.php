<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }

        img {
            pointer-events: none;
            user-select: none;
        }
    </style>
</head>

<body class="font-sans antialiased  bg-black">
    <div class="min-h-screen dark:bg-gray-900 ">
        {{-- @include('layouts.navigation') --}}

        @include('components.sidebar-left')

        @include('components.sidebar-right')


        <!-- Page Heading -->
        {{-- @if (isset($header))
            <header class="bg-dark sm:ml-64 dark:bg-gray-800 shadow">
                <div class="mx-auto py-6 px-4 sm:px-1 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif --}}

        <!-- Page Content -->
        <main class="mx-auto">
            @include('sweetalert::alert')
            {{ $slot }}
        </main>
    </div>

    <script>
        // function like(id, el) {
        //     fetch('/like/' + id).then(response => response.json()).then(data => {
        //         el.innerText = (data.status == 'LIKE') ? 'unlike' : 'like'
        //     });
        // }
        function like(id, el) {
            fetch('/like/' + id)
                .then(response => response.json())
                .then(data => {
                    if (data.status == 'LIKE') {
                        el.innerHTML = '<iconify-icon icon="material-symbols-light:favorite"></iconify-icon>';
                    } else {
                        el.innerHTML = '<iconify-icon icon="material-symbols:favorite-outline"></iconify-icon>';
                    }
                });
        }

        // function like(id, type = "POST") {
        //     let likesCount = 0
        //     let el = ''

        //     if (type == 'POST') {
        //         el = document.getElementById('likes-count-' + id);
        //     } else {
        //         el = document.getElementById('comment-count-' + id);
        //     }

        //     fetch('/like/' + type + '/' + id)
        //     .then(response => response.json())
        //     .then(data => {
        //         let currentCount = 0;

        //         if (data.status == "LIKE") {

        //         }
        //     })
        // }

        document.querySelectorAll(".captions").forEach(function(el) {
            let renderedText = el.innerHTML.replace(/#(\w+)/g,
                "<a href='search?search=%23$1' style='color: #00A9FF; text-decoration: underline'>#$1</a>");
            el.innerHTML = renderedText;
        });

        // const img = document.querySelector('img');
        // img.ondragstart = () => {
        //     return false;
        // };
    </script>

    {{-- <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
        img.onclick = function() {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
        </script> --}}
</body>

</html>
