<div class="grid grid-cols-4 grid-rows-6 gap-4">
    @foreach ($items as $index => $item)
        <div class="relative group {{ $index % 2 == 0 ? 'col-span-1 row-span-2' : '' }}">

            @if (!empty($item->gambar) && file_exists(public_path('storage/' . $item->gambar)))
                <img class="h-full object-cover rounded-lg" src="{{ asset('storage/' . $item->gambar) }}"
                    alt="{{ $item->judul }}">
            @else
                <img class="h-full object-cover rounded-lg" src="https://images.unsplash.com/photo-1499856871958-5b9627545d1a"
                    alt="Fallback Image">
            @endif

            <div
                class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <h3 class="text-lg font-bold">{{ $item->judul }}</h3>
                <p class="text-sm">{{ $item->deskripsi }}</p>
            </div>
        </div>
    @endforeach
</div>