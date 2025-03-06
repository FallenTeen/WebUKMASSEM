<div class="bg-gray-50 min-h-screen">
    @if($proker)

        <div class="relative h-[600px] w-full overflow-hidden">
            @if($proker->gambar)
                <img src="{{ asset('storage/' . $proker->gambar) }}" alt="{{ $proker->judul }}"
                    class="absolute inset-0 object-cover w-full h-full">
            @else
                <img src="{{ asset('images/proker-1.jpg') }}" alt="Default Image"
                    class="absolute inset-0 object-cover w-full h-full">
            @endif

            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-transparent"></div>

            <div class="container mx-auto px-4 relative h-full flex flex-col items-center justify-center z-10">
                @if($proker->kategori)
                    <span
                        class="px-4 py-1 bg-red-600 text-white text-sm font-medium rounded-full mb-6 transform hover:scale-105 transition-transform">
                        {{ $proker->kategori }}
                    </span>
                @endif

                <h1 class="text-5xl md:text-7xl font-bold text-center text-white px-4 mb-4 drop-shadow-lg max-w-4xl">
                    {{ ucfirst($proker->judul) }}
                </h1>

                @if($proker->judul2)
                    <h2 class="text-2xl md:text-3xl font-semibold text-center text-white/90 px-4 drop-shadow-md max-w-3xl">
                        {{ $proker->judul2 }}
                    </h2>
                @endif

                <div class="flex flex-wrap justify-center gap-6 mt-8">
                    @if($proker->tanggal_mulai)
                        <div class="flex items-center bg-white/20 backdrop-blur-sm rounded-full px-6 py-2">
                            <i class="fas fa-calendar text-white mr-2"></i>
                            <span class="text-white font-medium">
                                {{ $proker->tanggal_mulai->format('d M Y') }}
                                @if($proker->tanggal_selesai && $proker->tanggal_mulai->format('d M Y') != $proker->tanggal_selesai->format('d M Y'))
                                    - {{ $proker->tanggal_selesai->format('d M Y') }}
                                @endif
                            </span>
                        </div>
                    @endif

                    @if($proker->waktu_mulai)
                        <div class="flex items-center bg-white/20 backdrop-blur-sm rounded-full px-6 py-2">
                            <i class="fas fa-clock text-white mr-2"></i>
                            <span class="text-white font-medium">
                                {{ $proker->waktu_mulai->format('H:i') }}
                                @if($proker->waktu_selesai)
                                    - {{ $proker->waktu_selesai->format('H:i') }}
                                @endif
                            </span>
                        </div>
                    @endif

                    @if($proker->lokasi)
                        <div class="flex items-center bg-white/20 backdrop-blur-sm rounded-full px-6 py-2">
                            <i class="fas fa-map-marker-alt text-white mr-2"></i>
                            <span class="text-white font-medium">{{ $proker->lokasi }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="mx-auto py-12">
            <div class="mx-6 ">
                <div class="bg-white rounded-xl shadow-lg p-8 mb-12">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 pb-4 border-b border-gray-100">
                        Tentang Acara
                    </h3>
                    <div class="prose prose-lg max-w-none">
                        <p
                            class="text-lg leading-relaxed text-gray-700 indent-6 first-letter:text-3xl first-letter:font-bold first-letter:text-red-600">
                            {{ $proker->deskripsi }}
                        </p>
                    </div>
                </div>

                @if($proker->alamat_lengkap || $proker->biaya_tiket || $proker->kontak_info)
                    <div class="bg-white rounded-xl shadow-lg p-8 mb-12">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">
                            Detail Acara
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            @if($proker->alamat_lengkap)
                                <div class="flex">
                                    <div class="flex-shrink-0 mr-4">
                                        <div
                                            class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center text-red-500">
                                            <i class="fas fa-map-marked-alt text-xl"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Lokasi</h4>
                                        <p class="text-gray-600">{{ $proker->alamat_lengkap }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($proker->biaya_tiket)
                                <div class="flex">
                                    <div class="flex-shrink-0 mr-4">
                                        <div
                                            class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-500">
                                            <i class="fas fa-ticket-alt text-xl"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Harga Tiket</h4>
                                        <p class="text-gray-600">Rp {{ number_format($proker->biaya_tiket, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($proker->kontak_info)
                                <div class="flex">
                                    <div class="flex-shrink-0 mr-4">
                                        <div
                                            class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-500">
                                            <i class="fas fa-phone-alt text-xl"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Kontak</h4>
                                        <p class="text-gray-600">{{ $proker->kontak_info }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        @if($proker->url)
                            <div class="mt-10 text-center">
                                <a href="{{ $proker->url }}" target="_blank"
                                    class="inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-full transform hover:scale-105 transition-transform duration-300 shadow-lg">
                                    <i class="fas fa-ticket-alt mr-2"></i> Daftar Sekarang
                                </a>
                                <p class="text-sm text-gray-500 mt-3">Klik tombol di atas untuk mendaftar</p>
                            </div>
                        @endif
                    </div>
                @endif

                @if(is_array($proker->gambardesk) && count($proker->gambardesk) > 0)
                    <div class="bg-white rounded-xl shadow-lg p-8 mb-12">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">
                            Gallery Acara
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($proker->gambardesk as $image)
                                <div
                                    class="rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 group relative">
                                    <img src="{{ asset('storage/' . $image) }}" alt="Gallery Image"
                                        class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                                    <div
                                        class="absolute inset-0 bg-black opacity-0 group-hover:opacity-40 transition-opacity duration-300 flex items-center justify-center">
                                        <i
                                            class="fas fa-search-plus text-white text-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            @livewire('contentmanager.general-carousel', ['limit' => 5, 'randomize' => true, 'spesifikProker' => $proker->judul])
            @if($proker->prokers && $proker->prokers->count() > 0)
                <div class="py-12 px-4 rounded-xl mt-12">
                    <div class="max-w-7xl mx-auto">
                        <h3 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                            Program Terkait
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($proker->prokers as $relatedProker)
                                <div
                                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 group">
                                    <div class="h-56 overflow-hidden relative">
                                        @if($relatedProker->gambar)
                                            <img src="{{ asset('storage/' . $relatedProker->gambar) }}"
                                                alt="{{ $relatedProker->judul }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                                <span class="text-gray-400">No Image</span>
                                            </div>
                                        @endif

                                        @if($relatedProker->kategori)
                                            <span
                                                class="absolute top-4 right-4 px-3 py-1 bg-red-600 text-white text-xs font-medium rounded-full">
                                                {{ $relatedProker->kategori }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="p-6">
                                        <h4 class="font-bold text-xl mb-3 text-gray-800">{{ $relatedProker->judul }}</h4>

                                        <div class="flex items-center text-sm text-gray-500 mb-4">
                                            @if($relatedProker->tanggal_mulai)
                                                <span class="flex items-center mr-4">
                                                    <i class="fas fa-calendar mr-1"></i>
                                                    {{ $relatedProker->tanggal_mulai->format('d M Y') }}
                                                </span>
                                            @endif

                                            @if($relatedProker->lokasi)
                                                <span class="flex items-center">
                                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                                    {{ $relatedProker->lokasi }}
                                                </span>
                                            @endif
                                        </div>

                                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $relatedProker->deskripsi }}</p>
                                        <a href="{{ route('proker.show', $relatedProker->id) }}"
                                            class="inline-block text-red-600 hover:text-red-700 font-medium transition-colors">
                                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <div class=" px-4 mt-10 mb-4">
                <a href="{{ route('welcome') }}"
                    class="inline-flex items-center text-gray-700 hover:text-red-600 transition-colors font-medium">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Daftar Artikel
                </a>
            </div>
        </div>

    @else
        <div class="min-h-[70vh] flex items-center justify-center">
            <div class="bg-white rounded-xl shadow-lg p-12 max-w-lg w-full text-center">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Artikel tidak ditemukan</h2>
                <p class="text-gray-600 mb-8">Artikel yang Anda cari mungkin telah dihapus atau tidak tersedia saat ini.</p>
                <a href="{{ route('welcome') }}"
                    class="inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-300">
                    Lihat Artikel Lainnya
                </a>
            </div>
        </div>
    @endif
</div>