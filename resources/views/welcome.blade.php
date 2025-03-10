<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preload" href="{{ asset('icons/assem.png') }}" as="image">
    <link rel="preload" href="{{ asset('images/bg-1.JPG') }}" as="image">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-Poppins" loading="lazy">

    <x-custom.navbar></x-custom.navbar>

    <section id="landing" class="relative h-screen overflow-hidden bg-cover bg-center"
        style="background-image: url('{{ asset('images/bg-1.JPG') }}'); background-attachment: fixed;">
        <div class="absolute inset-0 bg-black bg-opacity-40 backdrop-filter backdrop-blur-sm"></div>
        <div class="relative z-10 flex flex-col lg:flex-row items-center justify-center lg:justify-around h-full from-black bg-gradient-to-t to-transparent bg-opacity-60"
            data-aos="zoom-out">
            <div class="mt-8 lg:mt-0 px-8 w-full lg:w-1/2 flex flex-col justify-center items-center lg:items-start">
                <div class="bg-gradient-to-r from-red-700 to-red-400 w-fit rounded-full drop-shadow-lg backdrop-blur-md flex items-center justify-center transform transition-all duration-500 hover:scale-105"
                    data-aos="fade-up" data-aos-delay="300">
                    <div class="flex h-10 mx-2 my-2 animate-pulse">
                        <img src="{{ asset('icons/assem.png') }}">
                    </div>
                    <h1 class="px-6 py-1 text-white text-2xl font-bold text-center lg:text-left">Welcome To</h1>
                </div>

                <h2 class="text-white text-4xl lg:text-6xl font-black mb-2 mt-4 drop-shadow-lg text-center lg:text-left animate-fadeIn"
                    data-aos="fade-up" data-aos-delay="600">UKM ASSEM</h2>
                <p class="text-white text-xl lg:text-2xl mb-4 font-Poppins font-semibold text-center lg:text-left"
                    data-aos="fade-up" data-aos-delay="900">
                    Unit Kegiatan Mahasiswa Amikom Seneng Seni Dan Musik
                </p>
                <p class="text-justify text-white text-md lg:text-xl font-Poppins font-md mt-2 lg:text-left line-clamp-8"
                    data-aos="fade-up" data-aos-delay="900">
                    UKM ASSEM (Amikom Seneng Seni dan Musik) adalah sebuah organisasi mahasiswa yang berdedikasi
                    dalam bidang
                    seni di lingkungan kampus. Organisasi ini memiliki lima divisi yang berfokus pada berbagai aspek
                    seni, menciptakan
                    platform untuk para mahasiswa yang berbakat dan bersemangat untuk berkarya di bidang seni.
                </p>

                <div class="mt-6 flex gap-8 justify-center lg:justify-start" data-aos="fade-up" data-aos-delay="1200">
                    <div
                        class="bg-gradient-to-r from-red-700 to-red-400 w-fit rounded-xl items-center flex hover:scale-105 duration-300 hover:from-red-300 hover:to-red-500">
                        <a href="#sejarah" class="scroll-link">
                            <div class="text-white px-6 py-4 font-bold">Jelajahi Lebih Jauh</div>
                        </a>
                    </div>

                    <a href="https://www.youtube.com/@ASSEMOfficial" target="_blank"
                        class="flex items-center justify-center w-16 h-16 text-white font-semibold text-lg rounded-full bg-gradient-to-r from-red-300 to-red-400 hover:from-red-300 hover:to-red-500 duration-300 hover:scale-110">
                        <div class="flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>

            <div class="hidden lg:flex px-8 w-1/4" data-aos="fade-left" data-aos-delay="1400">
                <img src="{{ asset('icons/assem.png') }}">
            </div>
        </div>
    </section>


    </section>

    <section id="sejarah" class="h-full flex flex-col gap-16 justify-center items-center bg-black text-white relative">
        <div class="absolute inset-0 w-full h-full bg-gradient-to-bl from-transparent via-indigo-500 opacity-50 to-transparent"
            style="mask-image: radial-gradient(circle at 15% 55%, rgba(75, 0, 130, 1) 5%, rgba(0, 0, 0, 0) 13%);">
        </div>
        <div class="absolute inset-0 w-full h-full bg-gradient-to-bl from-transparent via-red-500 opacity-50 to-transparent"
            style="mask-image: radial-gradient(circle at 10% 50%, rgba(75, 0, 130, 1) 1%, rgba(0, 0, 0, 0) 8%);">
        </div>

        <div class="absolute inset-0 w-full h-full bg-gradient-to-bl from-transparent via-indigo-500 opacity-50 to-transparent"
            style="mask-image: radial-gradient(circle at 85% 55%, rgba(75, 0, 130, 1) 5%, rgba(0, 0, 0, 0) 13%);">
        </div>
        <div class="absolute inset-0 w-full h-full bg-gradient-to-bl from-transparent via-red-500 opacity-50 to-transparent"
            style="mask-image: radial-gradient(circle at 75% 50%, rgba(75, 0, 130, 1) 2%, rgba(0, 0, 0, 0) 10%);">
        </div>


        <div class="max-w-screen-xl w-full px-4 sm:px-8 relative z-10">
            <div class="flex flex-col sm:flex-row items-center">
                <div data-aos="fade-right" class="sm:w-1/3 lg:w-1/3 w-72 p-6 text-center">
                    <img src="{{ asset('icons/assem.png') }}"
                        class="object-contain max-w-full mx-auto rounded-full drop-shadow-[0_0_25px_rgba(255,255,255,0.9)]">
                </div>

                <div class="sm:w-2/3 w-full p-6">
                    <div class="text">
                        <span data-aos="fade-left" data-aos-delay="100"
                            class="text-white/80 border-b-2 border-merah uppercase">Tentang Kami</span>
                        <h2 data-aos="fade-left" data-aos-delay="200" class="my-4 font-bold text-3xl sm:text-4xl">
                            Sejarah <span class="text-merah">UKM ASSEM</span>
                        </h2>
                        <p data-aos="fade-left" data-aos-delay="300" class="text-white/80">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, commodi
                            doloremque, fugiat illum magni minus nisi nulla numquam obcaecati placeat quia, repellat
                            tempore voluptatum.
                        </p>
                        <div data-aos="fade-left"
                            class="mt-10 bg-gradient-to-r from-red-700 to-red-400 w-fit rounded-xl items-center flex hover:scale-105 duration-300 hover:from-red-300 hover:to-red-500">
                            <a href="{{ route('sejarah') }}">
                                <div class="flex items-center text-white px-6 py-4 gap-2">
                                    <div class="text-white font-bold">Baca Selengkapnya </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="flex justify-center pb-16 text-white bg-black">
        <div class="max-w-screen-xl w-full px-4 sm:px-8">
            <div class="flex text-center items-center">
                <div class="w-full p-6">
                    <div class="text">
                        <h2 data-aos="fade-right" data-aos-delay="200" class="my-4 font-bold text-4xl lg:text-6xl">
                            VISI Dan MISI <span class="text-merah">UKM ASSEM</span>
                        </h2>
                        <div class="flex flex-col gap-8 mt-4 lg:gap-8">
                            <!-- Vision Section -->
                            <div data-aos="fade-up"
                                class="group relative p-8 rounded-2xl bg-gradient-to-br from-purple-900/30 to-blue-900/30 hover:bg-gradient-to-tl transition-all duration-500 border border-white/10 hover:border-white/20">
                                <div
                                    class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTggMHYxNk0xNiA4SDBNOCAwbDggOC04IDhMOCAwIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLW9wYWNpdHk9Ii4xIi8+PC9zdmc+')] opacity-10">
                                </div>
                                <div class="flex items-center gap-4 mb-6">
                                    <div class="p-3 bg-gradient-to-br from-purple-500 to-blue-500 rounded-lg shadow-lg">
                                        <i class="fas fa-eye text-xl text-white"></i>
                                    </div>
                                    <h2
                                        class="text-2xl font-bold bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent">
                                        VISI
                                    </h2>
                                </div>
                                <p
                                    class="text-lg leading-relaxed text-white/90 hover:text-white transition-colors duration-300">
                                    Unggul dalam kreativitas dan inovasi untuk melestarikan unsur seni budaya serta
                                    menjadi pelopor unit kegiatan mahasiswa berdasarkan pancasila.
                                </p>
                            </div>

                            <!-- Mission Section -->
                            <div data-aos="fade-up" data-aos-delay="200"
                                class="group relative p-8 rounded-2xl bg-gradient-to-br from-rose-900/30 to-amber-900/30 hover:bg-gradient-to-tl transition-all duration-500 border border-white/10 hover:border-white/20">
                                <div
                                    class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTggMHYxNk0xNiA4SDBtOC04IDggOC04IDhMOCAwIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLW9wYWNpdHk9Ii4xIi8+PC9zdmc+')] opacity-10">
                                </div>
                                <div class="flex items-center gap-4 mb-6">
                                    <div class="p-3 bg-gradient-to-br from-rose-500 to-amber-500 rounded-lg shadow-lg">
                                        <i class="fas fa-road text-xl text-white"></i>
                                    </div>
                                    <h2
                                        class="text-2xl font-bold bg-gradient-to-r from-rose-400 to-amber-400 bg-clip-text text-transparent">
                                        MISI
                                    </h2>
                                </div>
                                <div class="flex flex-col gap-6">
                                    <div class="flex gap-4 items-start">
                                        <div
                                            class="flex-shrink-0 mt-1 w-8 h-8 bg-white/10 rounded-full flex items-center justify-center text-amber-400 font-bold text-sm">
                                            1
                                        </div>
                                        <p
                                            class="text-lg leading-relaxed text-white/90 hover:text-white transition-colors duration-300">
                                            Menjalankan organisasi Unit Kegiatan Mahasiswa dalam bidang kesenian dan
                                            kebudayaan
                                        </p>
                                    </div>
                                    <div class="flex gap-4 items-start">
                                        <div
                                            class="flex-shrink-0 mt-1 w-8 h-8 bg-white/10 rounded-full flex items-center justify-center text-amber-400 font-bold text-sm">
                                            2
                                        </div>
                                        <p
                                            class="text-lg leading-relaxed text-white/90 hover:text-white transition-colors duration-300">
                                            Menyelenggarakan kegiatan pagelaran pentas seni dan budaya di lingkungan
                                            mahasiswa maupun masyarakat
                                        </p>
                                    </div>
                                    <div class="flex gap-4 items-start">
                                        <div
                                            class="flex-shrink-0 mt-1 w-8 h-8 bg-white/10 rounded-full flex items-center justify-center text-amber-400 font-bold text-sm">
                                            3
                                        </div>
                                        <p
                                            class="text-lg leading-relaxed text-white/90 hover:text-white transition-colors duration-300">
                                            Melaksanakan pengabdian masyarakat dan kerja sama di bidang kesenian
                                        </p>
                                    </div>
                                    <div class="flex gap-4 items-start">
                                        <div
                                            class="flex-shrink-0 mt-1 w-8 h-8 bg-white/10 rounded-full flex items-center justify-center text-amber-400 font-bold text-sm">
                                            4
                                        </div>
                                        <p
                                            class="text-lg leading-relaxed text-white/90 hover:text-white transition-colors duration-300">
                                            Mengembangkan minat dan bakat para mahasiswa di bidang kesenian
                                        </p>
                                    </div>
                                    <div class="flex gap-4 items-start">
                                        <div
                                            class="flex-shrink-0 mt-1 w-8 h-8 bg-white/10 rounded-full flex items-center justify-center text-amber-400 font-bold text-sm">
                                            5
                                        </div>
                                        <p
                                            class="text-lg text-left leading-relaxed text-white/90 hover:text-white transition-colors duration-300">
                                            Merangkul semua mahasiswa agar dapat menanamkan rasa cinta budaya serta
                                            mengasah kreativitas dalam bidang kesenian
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        @livewire('contentmanager.general-carousel', ['limit' => 5, 'randomize' => true,])
    </section>

    <section class="pt-4 items-center h-32 px-4 sm:px-48 text-white bg-black">
        <div class="z-10 w-full px-4 sm:px-8 flex flex-col lg:flex-row justify-between items-center gap-4">
            <div class="group flex flex-row justify-between items-center gap-4 sm:gap-8">
                <h1
                    class="font-Poppins font-bold text-2xl sm:text-4xl group-hover:scale-105 duration-150 text-center sm:text-left">
                    Lihat Tentang Kami Selengkapnya
                </h1>
                <div class="group-hover:translate-x-24 duration-200 hidden lg:block">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 sm:w-12 sm:h-12">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>
                </div>
            </div>

            <div
                class="bg-gradient-to-r from-red-700 to-red-400 w-fit rounded-xl items-center flex hover:scale-105 duration-300 hover:from-red-300 hover:to-red-500">
                <a href="#sejarah" class="scroll-link">
                    <div class="text-white px-6 py-4 font-bold text-center sm:text-left">Jelajahi Lebih Jauh</div>
                </a>
            </div>
        </div>
    </section>

    <section id="divisi" class="h-auto justify-center items-center flex flex-col gap-8 w-full bg-black text-white">
        <div data-aos="fade-up" class="items-center flex justify-center flex-col px-24">
            <h1 class="text-4xl lg:text-6xl font-bold">Divisi</h1>
            <span class="font-semibold text-center mt-8">UKM ASSEM sendiri memiliki 5 divisi pengkaryaan yang meliputi
                Divisi Musik, Divisi Fotografi, Divisi Film, Divisi Tari, dan Divisi Teater</span>
        </div>


        <div data-aos="fade-up"
            class="flex flex-wrap gap-4 justify-center px-2 mx-auto sm:grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
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
    <section class="pt-12 bg-black">
        @livewire('contentmanager.karya-carousel')
    </section>
    <section id="proker"
        class="pt-8 h-auto justify-center items-center flex flex-col gap-2 w-full bg-white text-black pb-6">
        <div class="items-center flex justify-center flex-col px-24" data-aos="fade-up">
            <h1 class="text-4xl lg:text-6xl font-bold">Program Kerja</h1>
            <span class="font-semibold text-center mt-8">UKM ASSEM sendiri memiliki beberapa program kerja yang meliputi
                semua divisi yang ada di UKM ASSEM beberapa diantaranya dapat dilihat disini</span>
        </div>

        <div data-aos="fade-up" class="flex flex-wrap gap-3 justify-center">
            <div class="absolute inset-0 w-full h-full bg-gradient-to-bl from-transparent via-indigo-500 opacity-50 to-transparent"
                style="mask-image: radial-gradient(circle at 15% 55%, rgba(75, 0, 130, 1) 5%, rgba(0, 0, 0, 0) 13%);">
            </div>
            <div class="absolute inset-0 w-full h-full bg-gradient-to-bl from-transparent via-red-500 opacity-50 to-transparent"
                style="mask-image: radial-gradient(circle at 10% 50%, rgba(75, 0, 130, 1) 1%, rgba(0, 0, 0, 0) 8%);">
            </div>

            <div class="absolute inset-0 w-full h-full bg-gradient-to-bl from-transparent via-indigo-500 opacity-50 to-transparent"
                style="mask-image: radial-gradient(circle at 85% 55%, rgba(75, 0, 130, 1) 5%, rgba(0, 0, 0, 0) 13%);">
            </div>
            <div class="absolute inset-0 w-full h-full bg-gradient-to-bl from-transparent via-red-500 opacity-50 to-transparent"
                style="mask-image: radial-gradient(circle at 75% 50%, rgba(75, 0, 130, 1) 2%, rgba(0, 0, 0, 0) 10%);">
            </div>

            @livewire('contentmanager.main-proker-card')
        </div>
    </section>

    <section class="py-12 bg-white text-black " id="contact">

        <div class="flex justify-center">
            <div class="text-center md:max-w-xl lg:max-w-3xl">
                <h2 class="mb-12 px-6 text-3xl font-bold">
                    Kontak kami
                </h2>
            </div>
        </div>

        <div class="flex flex-wrap justify-center">
            <div class="w-full shrink-0 grow-0 basis-auto lg:w-7/12">
                <div class="flex flex-wrap">
                    <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6">
                        <div class="align-start flex">
                            <div class="shrink-0">
                                <div class="inline-block rounded-md bg-teal-400-100 p-4 text-merah">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                    </svg>

                                </div>
                            </div>
                            <div class="ml-6 grow">
                                <p class="mb-2 font-bold ">ASSEM OFFICIAL</p>
                                <p class="text-neutral-600 ">
                                    assem.amikompurwokerto@gmail.com
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6">
                        <div class="flex items-start">
                            <div class="shrink-0">
                                <div class="inline-block rounded-md bg-teal-400-100 p-4 text-merah">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-6 grow">
                                <p class="mb-2 font-bold ">
                                    Humas
                                </p>
                                <p class="text-neutral-600 ">
                                    Humasassem25@gmail.com
                                </p>
                                <p class="text-neutral-600 ">
                                    +62 851 5620 8507 <a class="text-red-800 hover:underline"
                                        href="https://wa.me/6285156208507">(Whatsapp)</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6">
                        <div class="flex items-start">
                            <div class="shrink-0">
                                <div class="inline-block rounded-md bg-teal-400-100 p-4 text-merah">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                                    </svg>

                                </div>
                            </div>
                            <div class="ml-6 grow">
                                <p class="mb-2 font-bold">
                                    Kerumahtanggaan
                                </p>
                                <p class="text-neutral-600 ">
                                    rt@gmail.com
                                </p>
                                <p class="text-neutral-600 ">
                                    +62 838 5314 3635 <a class="text-red-800 hover:underline"
                                        href="https://wa.me/6283853143635">(Whatsapp)</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6">
                        <div class="align-start flex">
                            <div class="shrink-0">
                                <div class="inline-block rounded-md bg-teal-400-100 p-4 text-merah">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 12.75c1.148 0 2.278.08 3.383.237 1.037.146 1.866.966 1.866 2.013 0 3.728-2.35 6.75-5.25 6.75S6.75 18.728 6.75 15c0-1.046.83-1.867 1.866-2.013A24.204 24.204 0 0112 12.75zm0 0c2.883 0 5.647.508 8.207 1.44a23.91 23.91 0 01-1.152 6.06M12 12.75c-2.883 0-5.647.508-8.208 1.44.125 2.104.52 4.136 1.153 6.06M12 12.75a2.25 2.25 0 002.248-2.354M12 12.75a2.25 2.25 0 01-2.248-2.354M12 8.25c.995 0 1.971-.08 2.922-.236.403-.066.74-.358.795-.762a3.778 3.778 0 00-.399-2.25M12 8.25c-.995 0-1.97-.08-2.922-.236-.402-.066-.74-.358-.795-.762a3.734 3.734 0 01.4-2.253M12 8.25a2.25 2.25 0 00-2.248 2.146M12 8.25a2.25 2.25 0 012.248 2.146M8.683 5a6.032 6.032 0 01-1.155-1.002c.07-.63.27-1.222.574-1.747m.581 2.749A3.75 3.75 0 0115.318 5m0 0c.427-.283.815-.62 1.155-.999a4.471 4.471 0 00-.575-1.752M4.921 6a24.048 24.048 0 00-.392 3.314c1.668.546 3.416.914 5.223 1.082M19.08 6c.205 1.08.337 2.187.392 3.314a23.882 23.882 0 01-5.223 1.082" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-6 grow">
                                <p class="mb-2 font-bold">
                                    Bug report
                                </p>
                                <p class="text-neutral-600 ">
                                    vlamingvlaming0@gmail.com
                                </p>
                                <p class="text-neutral-600 ">
                                    +62 851 5620 8507 <a class="text-red-800 hover:underline"
                                        href="https://wa.me/6285156208507">(Whatsapp)</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <x-custom.footer></x-custom.footer>
    <script>
        if (!localStorage.getItem('visited')) {
            localStorage.setItem('visited', 'true');
            window.location.href = "/splash";
        }
    </script>

</body>

</html>