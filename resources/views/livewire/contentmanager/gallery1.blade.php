<div>
    <div class="flex lg:flex-row flex-col px-12 items-end w-full pb-6">
        <div class="relative text-white w-full max-w-lg">
            <button class="absolute left-2 -translate-y-1/2 top-1/2 p-1">
                <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img"
                    aria-labelledby="search" class="w-5 h-5 text-white">
                    <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9"
                        stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round">
                    </path>
                </svg>
            </button>

            <!-- Search Input -->
            <input wire:model.live.debounce.300ms="searchTerm"
                class="text-white input w-full rounded-full px-8 py-3 border-2 border-transparent focus:outline-none focus:border-red-500 placeholder-gray-400 transition-all duration-300 bg-white/20 backdrop-blur-lg shadow-md"
                placeholder="Cari Proker, Kegiatan, Tag..." />


            <!-- Reset Button -->
            <button wire:click="loadMore" type="button" class="absolute right-3 -translate-y-1/2 top-1/2 p-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <div class="flex w-full lg:max-w-lg space-x-4 text-white justify-center mt-4 lg:mt-0 lg:px-12">
            <div class="w-1/2">
                <label for="minDate" class="block text-white">Dari</label>
                <div class="relative">
                    <input wire:model.live.debounce.500ms="startDate" type="month" id="minDate"
                        class="w-full p-3 rounded-full border-2 border-transparent focus:outline-none focus:border-red-500 bg-white/20 backdrop-blur-lg shadow-md"
                        placeholder="Select Min Date" onclick="this.showPicker()" />
                </div>
            </div>

            <div class="w-1/2">
                <label for="maxDate" class="block text-white">Hingga</label>
                <input wire:model.live.debounce.500ms="endDate" type="month" id="maxDate"
                    class="w-full p-3 rounded-full border-2 border-transparent focus:outline-none focus:border-red-500 bg-white/20 backdrop-blur-lg shadow-md"
                    placeholder="Select Max Date" onclick="this.showPicker()" />
            </div>

        </div>


    </div>
    @if($items->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-4 grid-rows-{{ ceil($limit / 9) }} gap-4">

            @foreach ($items as $index => $item)
                <a href="{{ $item->url }}" class="relative group {{ $index % 4 == 0 ? 'col-span-1 row-span-2' : '' }}">

                    @if (!empty($item->gambar) && file_exists(public_path('storage/' . $item->gambar)))
                        <img class="h-full object-cover rounded-lg" src="{{ asset('storage/' . $item->gambar) }}"
                            alt="{{ $item->judul }}">
                    @else
                        <img class="h-full object-cover rounded-lg"
                            src="https://images.unsplash.com/photo-1499856871958-5b9627545d1a" alt="Fallback Image">
                    @endif

                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <h3 class="text-lg font-bold">{{ $item->judul }}</h3>
                        <p class="text-sm">{{ $item->deskripsi }}</p>
                    </div>
                </a>
            @endforeach


        </div>
        <div>
            @if ($items->count() >= $limit)
                <div
                    class="fter:h-px py-24 flex items-center before:h-px before:flex-1  before:bg-gray-300 before:content-[''] after:h-px after:flex-1 after:bg-gray-300  after:content-['']">
                    <button wire:click="loadMore" type="button"
                        class="group bg-gray-100 flex items-center rounded-full border border-gray-300 bg-secondary-50 px-4 py-2 text-center text-sm font-medium text-gray-900 hover:bg-gray-100">
                        <div class="group-hover:animate-bounce">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="mr-2 h-5 w-5">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        Lihat Lebih Banyak
                    </button>
                </div>
            @endif
        </div>
    @else
        <div>
            <div class="text-center justify-center flex text-white bg-black text-4xl font-bold">Hmmm... Nampaknya
                kata kunci/Tanggal tersebut tidak bisa aku cari yang cocok </div>
            <h1></h1>
        </div>
    @endif
</div>