<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-Poppin" loading="lazy">

    <x-custom.navbar></x-custom.navbar>

    <section id="landing" class="relative h-screen overflow-hidden bg-cover bg-center"
        style="background-image: url('{{ asset('images/bg-1.JPG') }}'); background-attachment: fixed;">
        <div class="absolute inset-0 bg-white opacity-30"></div>

    </section>


    </section>

    <section id="deskripsi"></section>

    <section>
        @livewire('contentmanager.general-carousel')
    </section>

    <section id="divisi" class="h-auto justify-center items-center flex flex-col gap-8 w-full bg-black text-white">
        <div data-aos="fade-up" class="items-center flex justify-center flex-col px-24">
            <h1 class="text-4xl lg:text-6xl font-bold">Divisi</h1>
            <span class="font-semibold text-center mt-8">UKM ASSEM sendiri memiliki 5 divisi pengkaryaan yang meliputi
                Divisi Musik, Divisi Fotografi, Divisi Film, Divisi Tari, dan Divisi Teater</span>
        </div>


        <div data-aos="fade-up"
            class="lg:flex hidden flex-wrap gap-4 justify-center px-2 mx-auto sm:grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
            <x-custom.flip-card title="Musik" emoji="🎼" frontContent="This is the front content."
                backContent="Here is the back content." actionText="Lihat Karya Kami" actionRoute="index.musik"
                backEmoji="🎼" backgroundImageFront="{{ asset('storage/images/music.png') }}" />

            <x-custom.flip-card title="Fotografi" emoji="📸" frontContent="This is the front content."
                backContent="Here is the back content." actionText="Lihat Karya Kami" actionRoute="index.foto"
                backEmoji="📸" backgroundImageFront="{{ asset('storage/images/foto.png') }}" />

            <x-custom.flip-card title="Film" emoji="🎬" frontContent="This is the front content."
                backContent="Here is the back content." actionText="Lihat Karya Kami" actionRoute="index.film"
                backEmoji="🎬" backgroundImageFront="{{ asset('storage/images/film.png') }}" />

            <x-custom.flip-card title="Tari" emoji="💃" frontContent="This is the front content."
                backContent="Here is the back content." actionText="Lihat Karya Kami" actionRoute="index.tari"
                backEmoji="💃" backgroundImageFront="{{ asset('storage/images/tari.png') }}" />

            <x-custom.flip-card title="Teater" emoji="🎭" frontContent="This is the front content."
                backContent="Here is the back content." actionText="Lihat Karya Kami" actionRoute="index.teater"
                backEmoji="🎭" backgroundImageFront="{{ asset('storage/images/teater.png') }}" />
        </div>

        <div data-aos="fade-up"
            class="flex lg:hidden flex-wrap gap-4 justify-center px-2 mx-auto sm:grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
        </div>
    </section>
    <x-custom.footer></x-custom.footer>
</body>

</html>