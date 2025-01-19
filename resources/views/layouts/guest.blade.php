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
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
        style="background-image: url('{{ asset('images/bglogin.jpg') }}'); background-size: cover; background-position: center;">
        <div>
            <a href="/" wire:navigate>
                <x-application-logo class="w-32 h-32 fill-current text-gray-500" />
            </a>
        </div>

        <div class="flex justify-center mt-6 w-full">
            <div
                class="w-full sm:max-w-md  px-6 py-6 bg-white dark:bg-gray-800 overflow-hidden sm:rounded-l-lg shadow-4xl">
                {{ $slot }}
            </div>
            <div
                class="flex flex-col w-full max-w-md justify-center items-center bg-red-700 text-white sm:rounded-r-lg backdrop-blur-lg bg-opacity-60">
                <h1 class="text-2xl font-Poppins text-center font-bold">SELAMAT DATANG DI UKMASSEM.COM</h1>
                <h1 class="text-lg font-Poppins text-center mb-4">Silahkan Masuk Untuk Melanjutkan</h1>
                <a href="{{ route('welcome') }}"
                    class="text-gray-800 flex justify-center gap-2 items-center mx-auto shadow-xl text-lg bg-gray-50 backdrop-blur-md lg:font-semibold isolation-auto border-gray-50 before:absolute before:w-full before:transition-all before:duration-700 before:hover:w-full before:-left-full before:hover:left-0 before:rounded-full before:bg-red-500 hover:text-gray-50 before:-z-10 before:aspect-square before:hover:scale-150 before:hover:duration-700 relative z-10 px-4 py-2 overflow-hidden border-2 rounded-full group">
                    Jelajahi Website
                    <svg class="w-8 h-8 justify-end group-hover:rotate-90 group-hover:bg-gray-50 text-gray-50 ease-linear duration-300 rounded-full border border-gray-700 group-hover:border-none p-2 rotate-45"
                        viewBox="0 0 16 19" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 18C7 18.5523 7.44772 19 8 19C8.55228 19 9 18.5523 9 18H7ZM8.70711 0.292893C8.31658 -0.0976311 7.68342 -0.0976311 7.29289 0.292893L0.928932 6.65685C0.538408 7.04738 0.538408 7.68054 0.928932 8.07107C1.31946 8.46159 1.95262 8.46159 2.34315 8.07107L8 2.41421L13.6569 8.07107C14.0474 8.46159 14.6805 8.46159 15.0711 8.07107C15.4616 7.68054 15.4616 7.04738 15.0711 6.65685L8.70711 0.292893ZM9 18L9 1H7L7 18H9Z"
                            class="fill-gray-800 group-hover:fill-gray-800"></path>
                    </svg>
                </a>


            </div>
        </div>
    </div>

</body>

</html>