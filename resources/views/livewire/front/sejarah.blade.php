<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-Poppins overflow-x-hidden">

    <x-custom.navbar></x-custom.navbar>

    <section id="hero"
        class="min-h-screen flex flex-col pt-20 gap-8 md:gap-16 justify-center items-center bg-black text-white relative overflow-hidden">
        <div class="absolute inset-0 w-full h-full bg-gradient-to-bl from-transparent via-indigo-600 opacity-60 to-transparent"
            style="mask-image: radial-gradient(circle at 15% 55%, rgba(75, 0, 130, 1) 5%, rgba(0, 0, 0, 0) 13%);">
        </div>
        <div class="absolute inset-0 w-full h-full bg-gradient-to-bl from-transparent via-red-600 opacity-60 to-transparent"
            style="mask-image: radial-gradient(circle at 10% 50%, rgba(75, 0, 130, 1) 1%, rgba(0, 0, 0, 0) 8%);">
        </div>

        <div class="absolute inset-0 w-full h-full bg-gradient-to-bl from-transparent via-indigo-600 opacity-60 to-transparent transform scale-y-100 scale-x-[-1]"
            style="mask-image: radial-gradient(circle at 85% 55%, rgba(75, 0, 130, 1) 5%, rgba(0, 0, 0, 0) 13%);">
        </div>
        <div class="absolute inset-0 w-full h-full bg-gradient-to-bl from-transparent via-red-600 opacity-60 to-transparent transform scale-y-100 scale-x-[-1]"
            style="mask-image: radial-gradient(circle at 75% 50%, rgba(75, 0, 130, 1) 2%, rgba(0, 0, 0, 0) 10%);">
        </div>

        <!-- Animated dots background -->
        <div
            class="absolute inset-0 w-full h-full opacity-20 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9IndoaXRlIi8+PC9zdmc+')]">
        </div>

        <div class="max-w-screen-xl w-full px-4 sm:px-8 relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <!-- Image Section with improved animations -->
                <div data-aos="fade-right" data-aos-duration="1200"
                    class="md:w-1/3 lg:w-2/5 w-72 p-6 text-center relative">
                    <div
                        class="absolute inset-0 rounded-full bg-gradient-to-r from-red-500 to-indigo-600 blur-xl opacity-30 animate-pulse">
                    </div>
                    <img src="{{ asset('icons/assem.png') }}"
                        class="object-contain max-w-full mx-auto rounded-full drop-shadow-[0_0_25px_rgba(255,255,255,0.9)] transition-all duration-500 hover:scale-105">
                </div>

                <div class="md:w-2/3 lg:w-3/5 w-full p-6">
                    <div class="text">
                        <span data-aos="fade-left" data-aos-delay="100" data-aos-duration="800"
                            class="text-white/90 border-b-2 border-merah uppercase tracking-wider font-medium">Tentang
                            Kami</span>
                        <h2 data-aos="fade-left" data-aos-delay="200" data-aos-duration="800"
                            class="my-4 font-bold text-3xl sm:text-4xl lg:text-5xl">
                            Sejarah <span class="text-merah relative inline-block">
                                UKM ASSEM
                                <span
                                    class="absolute -bottom-1 left-0 w-full h-1 bg-gradient-to-r from-red-600 to-red-400 transform scale-x-0 origin-left transition-transform group-hover:scale-x-100 duration-300"></span>
                            </span>
                        </h2>
                        <p data-aos="fade-left" data-aos-delay="300" data-aos-duration="800"
                            class="text-white/90 text-base md:text-lg max-w-3xl">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, commodi
                            doloremque, fugiat illum magni minus nisi nulla numquam obcaecati placeat quia, repellat
                            tempore voluptatum.
                        </p>
                        <div data-aos="fade-left" data-aos-delay="400" data-aos-duration="800"
                            class="mt-10 bg-gradient-to-r from-red-700 to-red-500 w-fit rounded-xl items-center flex hover:scale-105 duration-300 hover:from-red-500 hover:to-red-600 shadow-lg hover:shadow-red-500/30 transition-all">
                            <a href="#sejarah" class="group">
                                <div class="flex items-center text-white px-6 py-4 gap-2">
                                    <div class="text-white font-bold">Baca Selengkapnya </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="size-6 transform group-hover:translate-x-1 transition-transform duration-300">
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
    <section id="sejarah" class="flex justify-center py-16 md:py-24 text-white bg-black relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/10 to-black/30"></div>

        <div class="max-w-screen-xl w-full px-4 sm:px-8 relative z-10">
            <div class="flex text-center items-center">
                <div class="w-full p-6">
                    <div class="text">
                        <h2 data-aos="fade-up" data-aos-duration="800" class="my-8 font-bold text-4xl lg:text-6xl">
                            Sejarah Singkat <span class="text-merah">UKM ASSEM</span>
                        </h2>


                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="flex justify-center py-16 md:py-24 text-white bg-black relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-indigo-900/10 to-black/30"></div>

        <div class="max-w-screen-xl w-full px-4 sm:px-8 relative z-10">
            <div class="flex text-center items-center">
                <div class="w-full p-6">
                    <div class="text">
                        <h2 data-aos="fade-up" data-aos-duration="800" class="my-8 font-bold text-4xl lg:text-6xl">
                            VISI Dan MISI <span class="text-merah">UKM ASSEM</span>
                        </h2>

                        <div class="flex flex-col gap-8 mt-4 lg:gap-8">
            
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
                                            class="text-lg leading-relaxed text-white/90 text-left hover:text-white transition-colors duration-300">
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

    <section class="relative">
        @livewire('contentmanager.general-carousel')
    </section>

    <x-custom.footer></x-custom.footer>

    <button id="scrollToTop"
        class="fixed bottom-6 right-6 bg-gradient-to-r from-red-600 to-red-400 p-3 rounded-full shadow-lg z-50 text-white opacity-0 transition-opacity duration-300 hover:scale-110">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
        </svg>
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const scrollToTopButton = document.getElementById('scrollToTop');

            window.addEventListener('scroll', function () {
                if (window.scrollY > 300) {
                    scrollToTopButton.classList.remove('opacity-0');
                    scrollToTopButton.classList.add('opacity-100');
                } else {
                    scrollToTopButton.classList.remove('opacity-100');
                    scrollToTopButton.classList.add('opacity-0');
                }
            });

            scrollToTopButton.addEventListener('click', function () {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>