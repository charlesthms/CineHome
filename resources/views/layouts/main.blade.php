<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/css/app.css">
        {{-- Google --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
        {{-- Moovie js --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/BMSVieira/moovie.js@latest/css/moovie.min.css">
        <link rel="stylesheet" href="{{ asset('css/player.css') }}">
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
        {{-- Livewire --}}
        @livewireStyles


        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <title>CinéHome</title>

        <style>
            .filepond--root{
                border: none;
            }
            /* the text color of the drop label*/
            .filepond--drop-label {
                color: #fff;
            }

            /* underline color for "Browse" button */
            .filepond--label-action {
                color: #f97316;
                text-decoration-color: #aaa;
            }

            /* the background color of the filepond drop area */
            .filepond--panel-root {
                background-color: #1f2b45;
                border: 1px dashed #374151;
            }

        </style>
    </head>
    <body class="font-sans bg-gray-900">

        <x-nav></x-nav>

        <script src="https://cdn.jsdelivr.net/gh/BMSVieira/moovie.js@latest/js/moovie.min.js"></script>
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
        @yield('content')

        <x-footer></x-footer>

        @livewireScripts
    </body>
</html>
