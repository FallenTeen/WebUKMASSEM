<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UKM ASSEM</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <!--ANIMATE ON SCROLL-->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-Poppin">

    <x-custom.navbar></x-custom.navbar>

    <section id="landing" class="relative h-screen overflow-hidden bg-cover bg-center"
        style="background-image: url('{{ asset('images/bg-1.JPG') }}'); background-attachment: fixed;">
        <div class="relative z-10 flex flex-col lg:flex-row items-center justify-center lg:justify-around h-full from-black bg-gradient-to-t to-transparent bg-opacity-60"
            data-aos="zoom-out">
            <div class="mt-8 lg:mt-0 px-8 w-full lg:w-1/2 flex flex-col justify-center items-center lg:items-start">
                <div class="bg-gradient-to-r from-red-700 to-red-400 w-fit rounded-full drop-shadow-lg backdrop-blur-md flex items-center justify-center"
                    data-aos="fade-up" data-aos-delay="300">
                    <div class="flex h-10 mx-2 my-2">
                        <img src="{{ asset('icons/assem.png') }}">
                    </div>
                    <h1 class="px-6 py-1 text-white text-2xl font-bold text-center lg:text-left">Welcome To</h1>
                </div>

                <h2 class="text-white text-4xl lg:text-6xl font-black mb-2 mt-4 drop-shadow-lg text-center lg:text-left"
                    data-aos="fade-up" data-aos-delay="600">UKM ASSEM</h2>
                <p class="text-white text-xl lg:text-2xl mb-4 font-Poppins font-semibold text-center lg:text-left"
                    data-aos="fade-up" data-aos-delay="900">
                    Unit Kegiatan Mahasiswa Amikom Seneng Seni Dan Musik
                </p>
                <p class="text-white text-md lg:text-xl font-Poppins font-light mt-2 text-justify lg:text-left line-clamp-8"
                    data-aos="fade-up" data-aos-delay="900">
                    Unit UKM ASSEM (Amikom Seneng Seni dan Musik) adalah sebuah organisasi mahasiswa yang berdedikasi
                    dalam bidang
                    seni di lingkungan kampus. Organisasi ini memiliki lima divisi yang berfokus pada berbagai aspek
                    seni, menciptakan
                    platform untuk para mahasiswa yang berbakat dan bersemangat untuk berkarya di bidang seni.
                </p>

                <div class="mt-6 flex gap-8 justify-center lg:justify-start" data-aos="fade-up" data-aos-delay="1200">
                    <div
                        class="bg-gradient-to-r from-red-700 to-red-400 w-fit rounded-xl items-center flex hover:scale-105 duration-300 hover:from-red-300 hover:to-red-500">
                        <a href="#profile" class="scroll-link">
                            <div class="text-white px-6 py-4 font-bold">Jelajahi Lebih Jauh</div>
                        </a>
                    </div>

                    <a href="#"
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

    <section id="profile" class="h-screen justify-center items-center flex w-full bg-black text-white">ss</section>
    <section id="deskripsi"></section>
    <section id="divisi"></section>
    <section id="proker"></section>
    <section id="contact"></section>
    <x-custom.footer></x-custom.footer>
</body>

</html>