<!-- list Parameter
'proker' => 'mainproker',
'proker' => 'allproker',
'proker' => '[nama_proker]'
'limit' => 123,
'all'=> true/false
'randomize'
'containerClass' => 'classes' -->

<div class="{{ $containerClass }}">
@foreach ($prokers as $proker)
    <a href="{{ $proker->url }}" x-data="{ hovered: false }" 
        @mouseenter="hovered = true" 
        @mouseleave="hovered = false" 
        class="relative lg:w-96 w-48 overflow-hidden rounded-2xl px-4 sm:px-8 pb-8 pt-40 mt-12 transition-transform transform hover:-translate-y-4 duration-400">
        
        <!-- Background Image -->
        <img src="{{ asset('storage/' . $proker->gambar) }}" alt="{{ $proker->judul }}"
            class="absolute inset-0 h-full w-full object-cover">
        
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 transition-opacity duration-300" 
            :class="{ 'opacity-100': hovered, 'opacity-60': !hovered }"></div>
        
        <!-- Title -->
        <h3 class="z-10 text-2xl sm:text-3xl font-bold text-white transition-transform duration-300" 
            :class="{ 'translate-y-0': hovered, 'translate-y-8': !hovered }">
            {{ $proker->judul }}
        </h3>
        
        <!-- Description -->
        <div class="z-10 text-xs sm:text-sm leading-6 text-gray-300 transition-opacity duration-300"
            :class="{ 'opacity-100 translate-y-0': hovered, 'opacity-0 translate-y-4': !hovered }">
            {{ $proker->deskripsi }}
        </div>
    </a>
    @endforeach
</div>
