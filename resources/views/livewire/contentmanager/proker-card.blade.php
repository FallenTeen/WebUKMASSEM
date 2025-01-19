<article x-data="{ hovered: false }" 
    @mouseenter="hovered = true" 
    @mouseleave="hovered = false" 
    class="relative lg:w-96 w-48 overflow-hidden rounded-2xl px-4 sm:px-8 pb-8 pt-40 mt-4 transition-transform transform hover:-translate-y-4 duration-400">
    
    <!-- Background Image -->
    <img src="https://images.unsplash.com/photo-1499856871958-5b9627545d1a" alt="University of Southern California"
        class="absolute inset-0 h-full w-full object-cover">
    
    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 transition-opacity duration-300" 
        :class="{ 'opacity-100': hovered, 'opacity-60': !hovered }"></div>
    
    <!-- Title -->
    <h3 class="z-10 text-2xl sm:text-3xl font-bold text-white transition-transform duration-300" 
        :class="{ 'translate-y-0': hovered, 'translate-y-8': !hovered }">
        Paris
    </h3>
    
    <!-- Description -->
    <div class="z-10 text-xs sm:text-sm leading-6 text-gray-300 transition-opacity duration-300"
        :class="{ 'opacity-100 translate-y-0': hovered, 'opacity-0 translate-y-4': !hovered }">
        City of love
    </div>
</article>
