<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-Poppin">

    <x-custom.navbar></x-custom.navbar>

    <section id="sejarah" class="h-auto pt-16 flex flex-col gap-16 justify-center items-center bg-white text-black relative">
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
                <!-- Image Section -->
                <div data-aos="fade-right" class="sm:w-1/3 lg:1/3 w-72 p-6 text-center">
                    <img src="{{ asset('icons/assem.png') }}" class="object-contain max-w-full mx-auto">
                </div>

                <!-- Text Section -->
                <div class="sm:w-2/3 w-full p-6">
                    <div class="text">
                        <span data-aos="fade-left" data-aos-delay="100"
                            class="text-gray-500 border-b-2 border-merah uppercase">Tentang Kami</span>
                        <h2 data-aos="fade-left" data-aos-delay="200" class="my-4 font-bold text-3xl sm:text-4xl">
                            Sejarah <span class="text-merah">UKM ASSEM</span>
                        </h2>
                        <p data-aos="fade-left" data-aos-delay="300" class="text-gray-700">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, commodi
                            doloremque, fugiat illum magni minus nisi nulla numquam obcaecati placeat quia, repellat
                            tempore voluptatum.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="flex justify-center mb-12">
        <div class="max-w-screen-xl w-full px-4 sm:px-8">
            <div class="flex text-center items-center">
                <div class="w-full p-6">
                    <div class="text">
                        <h2 data-aos="fade-right" data-aos-delay="200" class="my-4 font-bold text-4xl lg:text-6xl">
                            VISI Dan MISI <span class="text-merah">UKM ASSEM</span>
                        </h2>
                        <div class="flex gap-24">
                            <div class="flex flex-col text-start gap-4">
                                <h1 data-aos="fade-right" class="text-2xl font-bold">VISI</h1>
                                <p data-aos="fade-right" data-aos-delay="300" class="text-gray-700">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, dolore eveniet.
                                    Cumque iusto nobis tempore labore atque aliquam culpa earum.
                                </p>
                            </div>
                            <div class="flex flex-col text-start gap-4">
                                <h1 data-aos="fade-right" class="text-2xl font-bold">Misi</h1>
                                <p data-aos="fade-right" data-aos-delay="300" class="text-gray-700">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, dolore eveniet.
                                    Cumque iusto nobis tempore labore atque aliquam culpa earum.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        @livewire('contentmanager.general-carousel')
    </section>

    <x-custom.footer></x-custom.footer>

</body>

</html>