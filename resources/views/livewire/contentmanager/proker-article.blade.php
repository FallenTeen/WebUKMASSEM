<div>
    <!-- Full Screen Image Modal -->
    <div x-data="{ show: @entangle('showFullScreenImage') }" x-show="show" 
         class="fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        <div class="relative w-full h-full flex items-center justify-center p-4">
            <button class="absolute top-4 right-4 text-white text-2xl" wire:click="closeFullScreenImage">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <img src="{{ $fullScreenImageSrc }}" alt="Full screen image" class="max-h-screen max-w-full object-contain">
        </div>
    </div>

    <div class="mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('welcome') }}" class="text-sm text-gray-700 hover:text-merah">
                        Home
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 truncate max-w-xs">{{ $proker->judul }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Main Image -->
            <div class="relative">
                <img src="{{ $proker->gambarUrl }}" alt="{{ $proker->judul }}" class="w-full h-64 sm:h-80 md:h-96 object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-6 text-white">
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $proker->kategori === 'primer' ? 'bg-merah text-white' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ ucfirst($proker->kategori) }}
                        </span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                            {{ $proker->tanggal->format('d M Y') }}
                        </span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-2">{{ $proker->judul }}</h1>
                    @if($mainProker)
                    <p class="text-sm sm:text-base opacity-90">
                        Bagian dari: <span class="font-medium">{{ ucfirst($mainProker->judul) }} ( {{ ucfirst($mainProker->judul2) }})</span>
                    </p>
                    @endif
                </div>
            </div>

            <div class="p-6">
                <!-- Tags -->
                @if(!empty($proker->tags) && count($proker->tags) > 0)
                <div class="flex flex-wrap gap-2 mb-6">
                    @foreach($proker->tags as $tag)
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                        #{{ $tag }}
                    </span>
                    @endforeach
                </div>
                @endif

                <div class="prose max-w-none mb-8">
                    {!! $proker->deskripsi !!}
                </div>
                @if(!empty($galleryImages) && count($galleryImages) > 0)
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold mb-4">Galeri</h3>
                        
                        <div x-data="{ 
                            activeIndex: 0,
                            isFullscreen: false,
                            images: @js($galleryImages),
                            
                            setActive(index) {
                                this.activeIndex = index;
                            },
                            
                            toggleFullscreen() {
                                this.isFullscreen = !this.isFullscreen;
                            },
                            
                            next() {
                                this.activeIndex = this.activeIndex < this.images.length - 1 ? this.activeIndex + 1 : 0;
                            },
                            
                            prev() {
                                this.activeIndex = this.activeIndex > 0 ? this.activeIndex - 1 : this.images.length - 1;
                            }
                        }" @keydown.escape.window="isFullscreen = false">
                            
                            <div class="mb-4 relative">
                                <img 
                                    x-bind:src="images[activeIndex]" 
                                    x-bind:alt="'Gallery Image ' + (activeIndex + 1)"
                                    class="w-full h-64 sm:h-80 object-contain rounded-lg cursor-pointer"
                                    @click="toggleFullscreen"
                                >
                                <button 
                                    @click.stop="prev"
                                    class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white/70 hover:bg-white/90 text-gray-800 p-2 rounded-full shadow-md"
                                    aria-label="Previous image"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                
                                <button 
                                    @click.stop="next"
                                    class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white/70 hover:bg-white/90 text-gray-800 p-2 rounded-full shadow-md"
                                    aria-label="Next image"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                                <div class="absolute bottom-2 right-2 bg-black/60 text-white text-xs px-2 py-1 rounded-full">
                                    <span x-text="activeIndex + 1"></span>/<span x-text="images.length"></span>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-2">
                                <template x-for="(image, index) in images" :key="index">
                                    <div 
                                        class="relative aspect-square overflow-hidden rounded-lg cursor-pointer" 
                                        @click="setActive(index)"
                                    >
                                        <img 
                                            :src="image" 
                                            :alt="'Thumbnail ' + (index + 1)" 
                                            class="w-full h-full object-cover hover:opacity-90 transition-opacity"
                                        >
                                        <div 
                                            class="absolute inset-0 border-2 rounded-lg pointer-events-none transition-colors"
                                            :class="{ 'border-merah': activeIndex === index, 'border-transparent': activeIndex !== index }"
                                        ></div>
                                    </div>
                                </template>
                            </div>
                            <div x-show="isFullscreen" 
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class="fixed inset-0 z-50 bg-black/90 flex items-center justify-center"
                                style="display: none;"
                                @click="toggleFullscreen"
                            >
                                <div @click.stop class="relative max-w-4xl max-h-screen p-4">
                                    <img 
                                        :src="images[activeIndex]" 
                                        :alt="'Fullscreen Image ' + (activeIndex + 1)" 
                                        class="max-h-[85vh] max-w-full object-contain"
                                    >
                                    <button 
                                        @click.stop="prev"
                                        class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white p-3 rounded-full"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                        </svg>
                                    </button>
                                    
                                    <button 
                                        @click.stop="next"
                                        class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white p-3 rounded-full"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                    
                                    <button 
                                        @click="toggleFullscreen" 
                                        class="absolute top-4 right-4 bg-black/40 hover:bg-black/60 text-white p-2 rounded-full"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                    
                                    <div class="absolute bottom-4 right-4 bg-black/60 text-white px-3 py-1 rounded-full">
                                        <span x-text="activeIndex + 1"></span>/<span x-text="images.length"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                    <div class="text-sm text-gray-600">
                        @if($proker->author)
                        <span>Dibuat oleh: {{ $proker->author->name }}</span>
                        @endif
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="inline-flex items-center text-gray-700 hover:text-merah">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                            </svg>
                            Bagikan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Prokers -->
        @if(count($relatedProkers) > 0)
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-6">Proker Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedProkers as $relatedProker)
                <a href="{{ route('proker.show', $relatedProker->id) }}" class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-48 overflow-hidden">
                        <img 
                            src="{{ $relatedProker->gambar ? Storage::url($relatedProker->gambar) : 'https://placehold.co/600x400?text=No+Image' }}" 
                            alt="{{ $relatedProker->judul }}" 
                            class="w-full h-full object-cover"
                        >
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-2 line-clamp-2">{{ $relatedProker->judul }}</h3>
                        <p class="text-gray-600 text-sm line-clamp-3">{{ strip_tags($relatedProker->excerpt) }}</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $relatedProker->kategori === 'primer' ? 'bg-merah text-merah' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ ucfirst($relatedProker->kategori) }}
                            </span>
                            <span class="text-sm text-gray-500">{{ $relatedProker->tanggal->format('d M Y') }}</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>