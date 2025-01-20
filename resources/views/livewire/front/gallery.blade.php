<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-Poppins">

    <x-custom.navbar></x-custom.navbar>

    <section id="gallery" class="relative h-screen overflow-hidden bg-cover bg-center"
        style="background-image: url('{{ asset('images/bg-1.JPG') }}'); background-attachment: fixed;">
        <div class="absolute inset-0 bg-white opacity-30"></div>
        <div
            class="relative z-10 flex flex-col lg:flex-row items-center justify-center lg:justify-around h-full from-black bg-gradient-to-t to-transparent bg-opacity-60">
            <div class="mt-8 lg:mt-0 px-8 w-full flex flex-col justify-center items-center lg:items-start text-white">
                <h1 class="w-full text-center mt-16 lg:mt-32 mb-4">Selamat Datang Di</h1>
                <h1 class="w-full text-center text-6xl lg:text-8xl font-bold mb-6">Galeri UKM ASSEM</h1>
                <h2 class="w-full text-center text-xl lg:text-2xl font-semibold">Lihat kenangan, dokumentasi, foto dan
                    lain lain disini!</h2>
                <div class="h-full w-full space-y-8 grow flex flex-col items-center mt-32">
                    <div class="flex justify-center w-full">
                        <a href="#galleryimg"
                            class="mt-4 text-gray-800 flex justify-center gap-2 items-center mx-auto shadow-xl text-lg bg-gray-50 backdrop-blur-md lg:font-semibold isolation-auto border-gray-50 before:absolute before:w-full before:transition-all before:duration-700 before:hover:w-full before:-left-full before:hover:left-0 before:rounded-full before:bg-red-500 hover:text-gray-50 before:-z-10 before:aspect-square before:hover:scale-150 before:hover:duration-700 relative z-10 px-4 py-2 overflow-hidden border-2 rounded-full group">
                            Jelajahi Galeri
                            <svg class="w-8 h-8 justify-end group-hover:animate-pulse group-hover:bg-gray-100 text-gray-900 ease-linear duration-300 rounded-full border border-gray-700 group-hover:border-none p-2"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div id="galleryimg" class="h-full bg-black px-4 pt-6">
        @livewire('contentmanager.gallery1', ['randomize' => true])
    </div>


    <x-custom.footer></x-custom.footer>

</body>

</html>