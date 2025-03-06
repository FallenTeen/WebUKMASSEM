<nav class="navbar fixed w-full bg-white/95 backdrop-blur-sm shadow-lg py-3 duration-300 z-30 font-Poppins border-b border-red-100"
    id="mainnav">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <div class="hidden lg:flex h-14 items-center space-x-2">
            <img src="{{ asset('icons/assem.png') }}"
                class="h-full scale-105 object-contain hover:scale-125 duration-300 cursor-pointer" alt="LOGO">
            <div class="text-black hover:scale-105 duration-200 cursor-pointer">
                <h1
                    class="font-poppins font-bold text-3xl leading-tight bg-gradient-to-r from-red-600 to-red-400 bg-clip-text text-transparent">
                    UKM ASSEM</h1>
                <h6 class="text-xs leading-tight">Unit Kegiatan Mahasiswa Amikom Seneng Seni Dan Musik</h6>
            </div>
        </div>

        <!-- Mobile Toggle Button -->
        <div class="lg:hidden flex justify-between items-center w-full">
            <button id="hamburger-icon"
                class="text-black focus:outline-none flex items-center gap-2 p-2 rounded-lg hover:bg-red-50 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6" viewBox="0 0 24 24">
                    <path d="M3 6h18M3 12h18M3 18h18"></path>
                </svg>
                <span class="text-sm font-medium">Menu</span>
            </button>
            <a href="#" class="text-black font-bold font-poppin text-xl">
                <span class="bg-gradient-to-r from-red-600 to-red-400 bg-clip-text text-transparent">UKM ASSEM</span>
            </a>
        </div>

        <div class="hidden lg:flex h-12 items-center font-semibold font-poppins">
            <a href="#landing" x-data="{
          currentRoute: window.location.pathname,
          redirectToWelcome() {
              if (this.currentRoute !== '/') {
                  window.location.href = '{{ route('welcome') }}';
              } else {
                  window.location.hash = '#landing';
              }
          }
       }" @click.prevent="redirectToWelcome()"
                class="mx-4 relative text-black hover:text-red-600 transition duration-300 ease-in-out before:absolute before:w-full before:scale-x-0 before:h-[2px] before:bottom-0 before:left-0 before:bg-red-600 before:origin-right hover:before:scale-x-100 hover:before:origin-left before:transition before:duration-300 hover:scale-110 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                Home
            </a>

            <a href="{{ route('sejarah') }}"
                class="mx-4 relative text-black hover:text-red-600 transition duration-300 ease-in-out before:absolute before:w-full before:scale-x-0 before:h-[2px] before:bottom-0 before:left-0 before:bg-red-600 before:origin-right hover:before:scale-x-100 hover:before:origin-left before:transition before:duration-300 hover:scale-110 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                </svg>
                Sejarah
            </a>

            <a href="{{ route('gallery') }}" x-data="{
          currentRoute: window.location.pathname,
          redirectToWelcome() {
              if (this.currentRoute !== '/galeri') {
                  window.location.href = '{{ route('gallery') }}';
              } else {
                  window.location.hash = '#gallery';
              }
          }
       }" @click.prevent="redirectToWelcome()"
                class="mx-4 relative text-black hover:text-red-600 transition duration-300 ease-in-out before:absolute before:w-full before:scale-x-0 before:h-[2px] before:bottom-0 before:left-0 before:bg-red-600 before:origin-right hover:before:scale-x-100 hover:before:origin-left before:transition before:duration-300 hover:scale-110 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
                Galeri
            </a>

            <div class="relative group">
                <a href="#divisi" x-data="{
          currentRoute: window.location.pathname,
          redirectToWelcome() {
              if (this.currentRoute !== '/') {
                  window.location.href = '{{ route('welcome') }}#divisi';
              } else {
                  window.location.hash = '#gallery';
              }
          }
       }" @click.prevent="redirectToWelcome()"
                    class="mx-4 relative text-black hover:text-red-600 transition duration-300 ease-in-out before:absolute before:w-full before:scale-x-0 before:h-[2px] before:bottom-0 before:left-0 before:bg-red-600 before:origin-right hover:before:scale-x-100 hover:before:origin-left before:transition before:duration-300 hover:scale-110 group-hover:text-red-600 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3" />
                    </svg>
                    Divisi
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 ml-1" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M6 9l6 6 6-6"></path>
                    </svg>
                </a>

                <div
                    class="absolute left-0 w-48 hidden group-hover:block bg-white shadow-lg rounded-md py-2 mt-0 z-10 transform -translate-x-1/4 opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out">
                    <a href="{{ route('index.film') }}"
                        class=" px-4 py-2 text-sm hover:bg-red-50 text-black transition-colors duration-200 flex items-center">
                        <span class="mr-2 text-lg">🎥</span> Film
                    </a>
                    <a href="{{ route('index.foto') }}"
                        class=" px-4 py-2 text-sm hover:bg-red-50 text-black transition-colors duration-200 flex items-center">
                        <span class="mr-2 text-lg">📸</span> Fotografi
                    </a>
                    <a href="{{ route('index.musik') }}"
                        class=" px-4 py-2 text-sm hover:bg-red-50 text-black transition-colors duration-200 flex items-center">
                        <span class="mr-2 text-lg">🎶</span> Musik
                    </a>
                    <a href="{{ route('index.teater') }}"
                        class=" px-4 py-2 text-sm hover:bg-red-50 text-black transition-colors duration-200 flex items-center">
                        <span class="mr-2 text-lg">🎭</span> Teater
                    </a>
                    <a href="{{ route('index.tari') }}"
                        class=" px-4 py-2 text-sm hover:bg-red-50 text-black transition-colors duration-200 flex items-center">
                        <span class="mr-2 text-lg">💃</span> Tari
                    </a>
                </div>
            </div>

            <div class="relative group">
                <a href="#proker"
                    class="mx-4 relative text-black hover:text-red-600 transition duration-300 ease-in-out before:absolute before:w-full before:scale-x-0 before:h-[2px] before:bottom-0 before:left-0 before:bg-red-600 before:origin-right hover:before:scale-x-100 hover:before:origin-left before:transition before:duration-300 hover:scale-110 group-hover:text-red-600 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                    </svg>
                    Program Kerja
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 ml-1" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M6 9l6 6 6-6"></path>
                    </svg>
                </a>

                <div
                    class="absolute left-0 w-80 hidden group-hover:block bg-white shadow-lg rounded-md py-2 mt-0 z-10 transform -translate-x-1/4 opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out">
                    <h3 class="px-4 py-2 font-bold text-gray-800 border-b border-gray-100">PROGRAM KERJA UTAMA</h3>
                    <a href="/main-proker/fisma"
                        class=" px-4 py-2 text-sm hover:bg-red-50 text-black transition-colors duration-200 flex items-center">
                        <span class="mr-2 text-lg">🎨</span> Festival Seniman Muda (FISMA)
                    </a>
                    <a href="/main-proker/aos"
                        class=" px-4 py-2 text-sm hover:bg-red-50 text-black transition-colors duration-200 flex items-center">
                        <span class="mr-2 text-lg">🎶</span> ASSEM on Stage (AOS)
                    </a>
                    <a href="/main-proker/ave"
                        class=" px-4 py-2 text-sm hover:bg-red-50 text-black transition-colors duration-200 flex items-center">
                        <span class="mr-2 text-lg">📷</span> ASSEM Visual Exhibition (AVE)
                    </a>
                    <a href="/main-proker/penpro"
                        class=" px-4 py-2 text-sm hover:bg-red-50 text-black transition-colors duration-200 flex items-center">
                        <span class="mr-2 text-lg">🎭</span> Pentas Produksi (Penpro)
                    </a>
                    <a href="/main-proker/RedCarpet"
                        class=" px-4 py-2 text-sm hover:bg-red-50 text-black transition-colors duration-200 flex items-center">
                        <span class="mr-2 text-lg">🌟</span> Red Carpet
                    </a>
                </div>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-end space-x-4">
            <div class="flex items-center space-x-3">
                <a href="https://www.instagram.com/assem_assik/" class="group" target="_blank" aria-label="Instagram">
                    <div
                        class="p-2 bg-white rounded-full shadow-sm group-hover:shadow-md group-hover:shadow-pink-200 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                            viewBox="0 0 50 50"
                            class="fill-current text-black group-hover:text-pink-600 transition-colors duration-300 ease-in-out">
                            <path
                                d="M 16 3 C 8.83 3 3 8.83 3 16 L 3 34 C 3 41.17 8.83 47 16 47 L 34 47 C 41.17 47 47 41.17 47 34 L 47 16 C 47 8.83 41.17 3 34 3 L 16 3 z M 37 11 C 38.1 11 39 11.9 39 13 C 39 14.1 38.1 15 37 15 C 35.9 15 35 14.1 35 13 C 35 11.9 35.9 11 37 11 z M 25 14 C 31.07 14 36 18.93 36 25 C 36 31.07 31.07 36 25 36 C 18.93 36 14 31.07 14 25 C 14 18.93 18.93 14 25 14 z M 25 16 C 20.04 16 16 20.04 16 25 C 16 29.96 20.04 34 25 34 C 29.96 34 34 29.96 34 25 C 34 20.04 29.96 16 25 16 z">
                            </path>
                        </svg>
                    </div>
                </a>

                <a href="https://www.youtube.com/@ASSEMOfficial" class="group" target="_blank" aria-label="YouTube">
                    <div
                        class="p-2 bg-white rounded-full shadow-sm group-hover:shadow-md group-hover:shadow-red-200 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                            viewBox="0 0 24 24"
                            class="fill-current text-black group-hover:text-red-600 transition-colors duration-300 ease-in-out">
                            <path
                                d="M23.5 6.2a2.5 2.5 0 0 0-1.8-1.8c-1.7-.5-8.7-.5-8.7-.5s-7 0-8.7.5A2.5 2.5 0 0 0 .5 6.2C-.1 7.9-.1 12 0 12s0 4.1.5 5.8c.5.7 1.3 1.2 2.2 1.4 1.7.5 8.7.5 8.7.5s7 0 8.7-.5c.9-.2 1.7-.7 2.2-1.4a2.5 2.5 0 0 0 1.8-1.8c.5-1.7.5-5.8 0-5.8s.1-4.1-.5-5.8zM9 15V9l6 3z">
                            </path>
                        </svg>
                    </div>
                </a>
            </div>

            <a href="{{ route('welcome') }}#contact" class="relative group">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-red-700 to-red-400 rounded-md blur-sm opacity-75 group-hover:opacity-100 transition-opacity duration-300 -z-10 scale-105 group-hover:scale-110">
                </div>
                <div
                    class="bg-gradient-to-r from-red-700 to-red-400 rounded-md px-4 py-2 text-white font-medium relative z-10 group-hover:scale-105 duration-300 flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                    <span>Hubungi Kami</span>
                </div>
            </a>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu"
        class="lg:hidden hidden mt-4 bg-white/95 backdrop-blur-sm rounded-lg shadow-lg mx-4 p-4 animate-fadeIn">
        <div class="space-y-2">
            <a href="#landing" x-data="{
              currentRoute: window.location.pathname,
              redirectToWelcome() {
                  if (this.currentRoute !== '/') {
                      window.location.href = '{{ route('welcome') }}';
                  } else {
                      window.location.hash = '#landing';
                  }
              }
           }" @click.prevent="redirectToWelcome()"
                class="flex items-center py-2 px-3 text-black hover:text-red-600 hover:bg-red-50 rounded-md transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 mr-3">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <span>Home</span>
            </a>

            <a x-data="{
              currentRoute: window.location.pathname,
              redirectToWelcome() {
                  if (this.currentRoute !== '/sejarah') {
                      window.location.href = '{{ route('sejarah') }}';
                  } else {
                      window.location.hash = '#sejarah';
                  }
              }
           }" @click.prevent="redirectToWelcome()" href="#sejarah"
                class="flex items-center py-2 px-3 text-black hover:text-red-600 hover:bg-red-50 rounded-md transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 mr-3">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                </svg>
                <span>Sejarah</span>
            </a>

            <a href="#gallery" x-data="{
              currentRoute: window.location.pathname,
              redirectToWelcome() {
                  if (this.currentRoute !== '/galeri') {
                      window.location.href = '{{ route('gallery') }}';
                  } else {
                      window.location.hash = '#gallery';
                  }
              }
           }" @click.prevent="redirectToWelcome()"
                class="flex items-center py-2 px-3 text-black hover:text-red-600 hover:bg-red-50 rounded-md transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 mr-3">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
                <span>Gallery</span>
            </a>

            <a href="#home" x-data="{
              currentRoute: window.location.pathname,
              redirectToWelcome() {
                  if (this.currentRoute !== '/') {
                      window.location.href = '{{ route('welcome') }}';
                  } else {
                      window.location.hash = '#divisi';
                  }
              }
           }" @click.prevent="redirectToWelcome()"
                class="flex items-center py-2 px-3 text-black hover:text-red-600 hover:bg-red-50 rounded-md transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 mr-3">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <span>Divisi</span>
            </a>

            <a href="#proker" x-data="{
              currentRoute: window.location.pathname,
              redirectToWelcome() {
                  if (this.currentRoute !== '/') {
                      window.location.href = '{{ route('welcome') }}';
                  } else {
                      window.location.hash = '#proker';
                  }
              }
           }" @click.prevent="redirectToWelcome()"
                class="flex items-center py-2 px-3 text-black hover:text-red-600 hover:bg-red-50 rounded-md transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 mr-3">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <span>Divisi</span>
            </a>


            <div class="flex items-center mt-4 justify-end">
                <a href="https://www.instagram.com/assem_assik/" class="mx-2" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 50 50"
                        class="fill-current text-black hover:text-pink-600 hover:scale-110 transition-transform duration-300 ease-in-out">
                        <path
                            d="M 16 3 C 8.83 3 3 8.83 3 16 L 3 34 C 3 41.17 8.83 47 16 47 L 34 47 C 41.17 47 47 41.17 47 34 L 47 16 C 47 8.83 41.17 3 34 3 L 16 3 z M 37 11 C 38.1 11 39 11.9 39 13 C 39 14.1 38.1 15 37 15 C 35.9 15 35 14.1 35 13 C 35 11.9 35.9 11 37 11 z M 25 14 C 31.07 14 36 18.93 36 25 C 36 31.07 31.07 36 25 36 C 18.93 36 14 31.07 14 25 C 14 18.93 18.93 14 25 14 z M 25 16 C 20.04 16 16 20.04 16 25 C 16 29.96 20.04 34 25 34 C 29.96 34 34 29.96 34 25 C 34 20.04 29.96 16 25 16 z">
                        </path>
                    </svg>
                </a>

                <a href="https://www.youtube.com/@ASSEMOfficial" class="mx-2" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 24 24"
                        class="fill-current text-black hover:text-red-600 hover:scale-110 transition-transform duration-300 ease-in-out">
                        <path
                            d="M23.5 6.2a2.5 2.5 0 0 0-1.8-1.8c-1.7-.5-8.7-.5-8.7-.5s-7 0-8.7.5A2.5 2.5 0 0 0 .5 6.2C-.1 7.9-.1 12 0 12s0 4.1.5 5.8c.5.7 1.3 1.2 2.2 1.4 1.7.5 8.7.5 8.7.5s7 0 8.7-.5c.9-.2 1.7-.7 2.2-1.4a2.5 2.5 0 0 0 1.8-1.8c.5-1.7.5-5.8 0-5.8s.1-4.1-.5-5.8zM9 15V9l6 3z">
                        </path>
                    </svg>
                </a>
                <div
                    class="bg-gradient-to-r from-red-700 to-red-400 w-fit rounded-md items-center flex hover:scale-105 duration-300 border hover:border-white border-black">
                    <a href="{{ route('welcome') }}#contact" target="_blank">
                        <div class="text-white px-4 ">Hubungi Kami</div>
                    </a>
                </div>
            </div>


        </div>
</nav>

<script>
    // Toggle Mobile Menu
    document.getElementById('hamburger-icon').addEventListener('click', function () {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });

</script>