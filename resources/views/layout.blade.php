<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ora Et Labora | {{ $title }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/css/tw-elements.min.css" />
    {{-- CDN for JQUERY --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    {{-- Swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    {{-- CDN for SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Volkhov:ital,wght@0,400;0,700;1,400;1,700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            color: var(--dark1);
            --main1: rgb(124, 166, 216);
            --main2: #b0d1cb;
            --dark1: #00295c;
            --neutral1: #fff7f6;
            --neutral2: #f9d7d6;
            --side1: rgb(255, 184, 199);
            --side2: rgb(249, 198, 209);
            --shadow1: rgba(93, 159, 240, 0.3);
            --shadow1a: rgba(93, 159, 240, 0.2);
            --shadow1b: rgba(93, 159, 240, 0.1);
            --shadow2: rgba(176, 209, 203, 0.3);
            --shadow3: rgba(255, 184, 199, 0.3);

        }

        .swal2-confirm {
            background: rgb(41, 132, 235) !important;
        }

        .swal2-deny,
        .swal2-cancel {
            background: rgb(242, 73, 73) !important;
        }

        body {
            overflow-x: hidden;
            background-color: var(--neutral1);

        }

        .truncate-text {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* Limit the number of visible lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

    {{-- @vite('resources/css/app.css') --}}
    @yield('head')
</head>

<body>
    @include('user.navbar')


    @yield('content')

    @include('user.footer')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/js/tw-elements.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>


    <script>
        AOS.init();
    </script>
</body>

</html>
