<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-Poppins" loading="lazy">

    <x-custom.navbar></x-custom.navbar>

    <section id="landing" class="relative h-screen overflow-hidden bg-cover bg-center"
        style="background-image: url('{{ asset('images/bg-1.JPG') }}'); background-attachment: fixed;">
        <div
            class="flex flex-col gap-2 w-full h-full justify-center items-center text-black bg-gradient-to-b from-transparent via-white/80 to-white">

            <div class="h-1/2 w-1/2 items-end justify-center flex gap-2">
                <div class="flex flex-col justify-center items-center text-center">
                    <div class="text-xl font-semibold">Divisi</div>
                    <div class="flex items-center justify-center">
                        <div class="px-16 py-2 relative overflow-hidden group">
                            <div
                                class="absolute -left-10 top-0 bottom-0 w-24 bg-merah group-hover:w-[calc(100%+3rem)] transition-all duration-300 ease-in-out">
                            </div>
                            <p
                                class="text-6xl font-bold transition-colors duration-300 relative z-10 group-hover:text-white">
                                Tari
                            </p>
                        </div>
                    </div>

                </div>

            </div>
            <div class="w-1/2 items-center justify-center text-center flex h-1/2">
                <a href="#deskripsi"
                    class="mt-4 text-gray-800 flex justify-center gap-2 items-center mx-auto shadow-xl text-lg bg-gray-50 backdrop-blur-md lg:font-semibold isolation-auto border-gray-50 before:absolute before:w-full before:transition-all before:duration-700 before:hover:w-full before:-left-full before:hover:left-0 before:rounded-full before:bg-merah hover:text-gray-50 before:-z-10 before:aspect-square before:hover:scale-150 before:hover:duration-700 relative z-10 px-4 py-2 overflow-hidden border-2 rounded-full group">
                    Jelajahi Tentang Divisi Tari
                    <svg class="w-8 h-8 justify-end group-hover:animate-pulse group-hover:bg-gray-100 text-gray-900 ease-linear duration-300 rounded-full border border-gray-700 group-hover:border-none p-2"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>


    <section id="deskripsi" class="mt-6 min-h-screen w-full bg-white">
        <div class="flex flex-col lg:flex-row justify-center items-center w-full h-full">
            <!-- Left Section -->
            <div class="w-full lg:w-1/2 px-6 py-6 lg:px-24 lg:py-24 grid grid-cols-2 sm:grid-cols-2 gap-4">
                <div class="col-span-1 grid grid-rows-5 gap-4">
                    <div class="row-span-3">
                        <img class="w-full h-full object-cover aspect-video rounded-lg"
                            src="{{ asset('storage/images/Tari-1.jpg') }}" alt="Placeholder Image 1">
                    </div>
                    <div class="row-span-2">
                        <img class="w-full h-full object-cover aspect-video rounded-lg"
                            src="{{ asset('storage/images/Tari-2.jpg') }}" alt="Placeholder Image 2">
                    </div>
                </div>
                <div class="col-span-1 grid grid-rows-5 gap-4">
                    <div class="row-span-2">
                        <img class="w-full h-full object-cover aspect-video rounded-lg"
                            src="{{ asset('storage/images/Tari-3.jpg') }}" alt="Placeholder Image 3">
                    </div>
                    <div class="row-span-3">
                        <img class="w-full h-full object-cover aspect-video rounded-lg"
                            src="{{ asset('storage/images/Tari-4.jpg') }}" alt="Placeholder Image 4">
                    </div>
                </div>
            </div>


            <!-- Right Section -->
            <div class="w-full lg:w-1/2  px-6 py-6">
                <div class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-4">
                    Tentang Divisi Tari
                </div>
                <p class="indent-8 text-justify">
                    Divisi Tari UKM ASSEM adalah wadah bagi mahasiswa yang memiliki minat dan bakat di bidang seni tari,
                    divisi tari bukan hanya tempat untuk menari, tetapi juga keluarga yang saling mendukung dan
                    berkembang bersama. Kami rutin mengadakan latihan, mengikuti berbagai kompetisi, serta tampil dalam
                    acara-acara kampus dan luar kampus sebagai representasi UKM ASSEM. Selain meningkatkan keterampilan
                    tari, anggota juga belajar disiplin, kerja sama tim, dan rasa cinta terhadap budaya.
                </p>
            </div>
        </div>
    </section>


    <section>
        @livewire('contentmanager.karya-carousel')
    </section>

    <section id="divisi" class="h-auto justify-center items-center flex flex-col gap-8 w-full bg-black text-white py-4">
        <div data-aos="fade-up" class="items-center flex justify-center flex-col px-24">
            <h1 class="text-4xl lg:text-6xl font-bold">Divisi</h1>
            <span class="font-semibold text-center mt-8">UKM ASSEM sendiri memiliki 5 divisi pengkaryaan yang meliputi
                Divisi Musik, Divisi Fotografi, Divisi Film, Divisi Tari, dan Divisi Teater</span>
        </div>


        <div data-aos="fade-up"
            class="lg:flex hidden flex-wrap gap-4 justify-center px-2 mx-auto sm:grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
            <x-custom.flip-card title="Musik" emoji="🎼"
                frontContent="Eksplorasi bunyi dan nada yang menggetarkan jiwa. Divisi Musik menghadirkan karya-karya segar penuh inspirasi."
                backContent="Dari aransemen klasik hingga musik eksperimental - kami mendobrak batas kreativitas dengan tetap menjaga kualitas."
                actionText="Lihat Karya Kami" actionRoute="index.musik" backEmoji="🎼"
                backgroundImageFront="{{ asset('storage/images/music.png') }}" />

            <x-custom.flip-card title="Fotografi" emoji="📸"
                frontContent="Menangkap cerita dalam setiap bingkai. Divisi Fotografi melihat dunia dengan perspektif berbeda yang menginspirasi."
                backContent="Kami mengekspresikan kreativitas melalui lensa, menciptakan visual yang berkesan dan memiliki makna mendalam."
                actionText="Lihat Karya Kami" actionRoute="index.foto" backEmoji="📸"
                backgroundImageFront="{{ asset('storage/images/foto.png') }}" />

            <x-custom.flip-card title="Film" emoji="🎬"
                frontContent="Bercerita melalui visual yang bergerak. Divisi Film menghadirkan karya sinematik yang menggerakkan emosi."
                backContent="Dari cerita sehari-hari hingga konsep abstrak, kami membingkai ide-ide kreatif dalam karya audio visual yang menghibur dan bermakna."
                actionText="Lihat Karya Kami" actionRoute="index.film" backEmoji="🎬"
                backgroundImageFront="{{ asset('storage/images/film.png') }}" />

            <x-custom.flip-card title="Tari" emoji="💃"
                frontContent="Memaknai kehidupan melalui gerakan. Divisi Tari mempersembahkan koreografi yang memukau dan penuh pesona."
                backContent="Paduan gerak tradisional dan modern, kami menampilkan ekspresi tubuh yang bercerita tentang identitas dan keindahan seni pertunjukan."
                actionText="Lihat Karya Kami" actionRoute="index.tari" backEmoji="💃"
                backgroundImageFront="{{ asset('storage/images/tari.png') }}" />

            <x-custom.flip-card title="Teater" emoji="🎭"
                frontContent="Membawa penonton ke dunia imajinasi. Divisi Teater menghidupkan cerita dengan akting yang memikat."
                backContent="Kami menciptakan pengalaman panggung yang menghibur sekaligus membuat penontonnya berpikir dan merasakan."
                actionText="Lihat Karya Kami" actionRoute="index.teater" backEmoji="🎭"
                backgroundImageFront="{{ asset('storage/images/teater.png') }}" />
        </div>

        <div data-aos="fade-up"
            class="flex lg:hidden flex-wrap gap-4 justify-center px-2 mx-auto sm:grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
        </div>
    </section>
    <x-custom.footer></x-custom.footer>
</body>

</html>