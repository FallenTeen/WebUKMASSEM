<div class="flex flex-wrap gap-4 justify-center {{ $containerClass }}">
    @foreach ($prokers as $proker)
        <a href="{{ route('mainproker.show', ['proker' => $proker->judul]) }}" 
            x-data="{ hovered: false }"
            @mouseenter="hovered = true" 
            @mouseleave="hovered = false" 
            class="relative w-full sm:w-48 lg:w-96 overflow-hidden rounded-2xl px-4 sm:px-8 pb-8 pt-40 mt-12 transition-transform transform hover:-translate-y-4 duration-400">
            <img src="{{ asset('storage/' . $proker->gambar) }}" alt="{{ $proker->judul }}"
                class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 transition-opacity duration-300" 
                :class="{ 'opacity-100': hovered, 'opacity-60': !hovered }"></div>
            <h3 class="z-10 relative text-2xl sm:text-3xl font-bold text-white transition-transform duration-300" 
                :class="{ 'translate-y-0': hovered, 'translate-y-8': !hovered }">
                {{ ucfirst($proker->judul) }}
            </h3>
            <div class="z-10 text-xs sm:text-sm leading-6 text-gray-300 transition-opacity duration-300 line-clamp-1"
                :class="{ 'opacity-100 translate-y-0': hovered, 'opacity-0 translate-y-4': !hovered }">
                {{ $proker->deskripsi }}
            </div>
        </a>
    @endforeach
</div>