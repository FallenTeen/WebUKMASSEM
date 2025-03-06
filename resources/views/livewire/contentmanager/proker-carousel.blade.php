<div x-data="{
        autoplayIntervalTime: 4000,
        currentIndex: 0,
        totalItems: @json(count($items)),
        previous() {                
            this.currentIndex = (this.currentIndex - 1 + this.totalItems) % this.totalItems;           
        },            
        next() {                
            this.currentIndex = (this.currentIndex + 1) % this.totalItems;              
        },
        startAutoplay() {
            setInterval(() => {
                this.next();
            }, this.autoplayIntervalTime);
        }
    }" x-init="startAutoplay()" class="relative w-full h-96 overflow-hidden">

    <div class="h-full relative">
        @foreach ($items as $index => $item)
            <div x-show="currentIndex === {{ $index }}" x-transition.opacity.duration.1000ms
                class="absolute inset-0 w-full h-full">
                <div
                    class="lg:px-32 lg:py-14 absolute inset-0 z-10 flex flex-col items-center justify-end gap-2 bg-gradient-to-t from-neutral-950/85 to-transparent px-16 py-12 text-center">
                    <h3 class="w-full lg:w-[80%] text-balance text-2xl lg:text-3xl font-bold text-white">{{ $item->judul }}
                    </h3>
                    <p class="lg:w-1/2 w-full text-pretty text-sm text-neutral-300 line-clamp-3">{{$item->deskripsi}}</p>
                    <a class="text-white rounded-full border px-4 py-2 border-5 hover:bg-white hover:text-black duration-300 border-white"
                        href="{{ route('proker.show', ['id' => $item->id]) }}" target="_blank">Lihat lebih lanjut
                        {{ $item->judul }}</a>
                </div>
                <img src="{{ $item->gambar }}" class="w-full h-full object-center object-cover" alt="">
            </div>
        @endforeach
    </div>

    <button @click="previous()"
        class="absolute left-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
        aria-label="previous slide">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3"
            class="size-5 md:size-6 pr-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>
    </button>
    <button @click="next()"
        class="absolute right-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
        aria-label="next slide">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3"
            class="size-5 md:size-6 pl-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
    </button>
</div>