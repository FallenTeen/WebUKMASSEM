<div>
    <!-- Desktop Version -->
    <div class="z-40 hidden lg:block group relative h-96 w-72 [perspective:1000px] cursor-pointer">
        <div
            class="absolute duration-700 w-full h-full [transform-style:preserve-3d] group-hover:[transform:rotateY(180deg)] shadow-2xl">
            <div class="absolute w-full h-full rounded-xl p-6 text-white [backface-visibility:hidden] overflow-hidden"
                style="background-image: url('{{ $backgroundImageFront }}'), linear-gradient(135deg, rgba(128, 128, 128, 0.9), rgba(0, 0, 0, 0.95));background-size: cover; background-position: center;">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white opacity-10 rounded-full -mt-10 -mr-10"></div>
                <div class="absolute bottom-0 left-0 w-16 h-16 bg-white opacity-10 rounded-full -mb-8 -ml-8"></div>

                <div class="flex flex-col h-full relative z-10">
                    <div class="flex justify-between items-start">
                        <div
                            class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-300">
                            {{ $title ?? 'Card Title' }}
                        </div>
                        <div class="text-5xl animate-pulse transform hover:scale-110 transition-transform">
                            {!! $emoji ?? '🌟' !!}
                        </div>
                    </div>
                    <div class="mt-6">
                        <p class="text-lg leading-relaxed">
                            {{ $frontContent ?? 'Front content goes here. This is visible before hovering.' }}
                        </p>
                    </div>
                    <div class="mt-auto flex items-center space-x-2">
                        <span class="inline-block w-8 h-0.5 bg-white opacity-50"></span>
                        <p class="text-sm font-medium tracking-wide opacity-75">Lihat Karya Kami</p>
                    </div>
                </div>
            </div>

            <a href="{{ route($actionRoute) }}">
                <div class="absolute w-full h-full rounded-xl p-6 text-white [transform:rotateY(180deg)] [backface-visibility:hidden] overflow-hidden"
                    style="background: linear-gradient(135deg, rgba(139, 0, 0, 0.8), rgba(20, 20, 20, 0.9));">
                    <div
                        class="absolute top-0 left-0 w-full h-32 bg-white opacity-5 -rotate-45 transform -translate-y-16">
                    </div>
                    <div class="absolute bottom-0 right-0 w-32 h-32 rounded-full bg-white opacity-5"></div>

                    <div class="flex flex-col h-full relative z-10">
                        <div class="text-2xl font-bold mb-4 border-b border-white border-opacity-20 pb-2">
                            Discover More
                        </div>
                        <div class="flex-grow">
                            <p class="text-lg leading-relaxed">
                                {{ $backContent ?? 'Back content goes here. This is visible after hovering.' }}
                            </p>
                        </div>
                        <div class="flex justify-between items-center mt-auto">
                            @if(isset($actionRoute) && !empty($actionRoute))
                                <a href="{{ route($actionRoute) }}"
                                    class="relative z-50 px-4 py-2 bg-white text-red-700 rounded-lg font-semibold hover:bg-opacity-90 transition-all duration-300 transform hover:scale-105 hover:shadow-glow"
                                    onclick="event.stopPropagation();">
                                    {{ $actionText ?? 'Learn More' }}
                                </a>
                            @else
                                <a href="#"
                                    class="relative z-50 px-4 py-2 bg-white text-red-700 rounded-lg font-semibold hover:bg-opacity-90 transition-all duration-300 transform hover:scale-105 hover:shadow-glow"
                                    onclick="event.stopPropagation();">
                                    {{ $actionText ?? 'Learn More' }}
                                </a>
                            @endif

                            <span class="text-3xl animate-bounce">
                                {!! $backEmoji ?? '✨' !!}
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Mobile Version -->
    <div class="block lg:hidden relative w-full h-48 rounded-xl shadow-lg overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-800 to-gray-900"></div>
        <div class="absolute top-0 right-0 w-20 h-20 bg-white opacity-5 rounded-full -mt-10 -mr-10"></div>
        <div class="absolute bottom-0 left-0 w-32 h-32 bg-white opacity-5 rounded-full -mb-16 -ml-16"></div>

        <div class="relative z-10 flex flex-col justify-between items-center h-full text-white p-6">
            <div class="flex items-center space-x-3">
                <span class="text-3xl">{!! $emoji ?? '🌟' !!}</span>
                <div class="text-xl font-bold tracking-wide">
                    {{ $title ?? 'Card Title' }}
                </div>
            </div>

            <p class="text-center text-sm opacity-80 max-w-xs mx-auto">
                {{ Str::limit($frontContent ?? 'Discover what we offer', 60) }}
            </p>
            @if(isset($actionRoute) && !empty($actionRoute))
                <a href="{{ route($actionRoute) }}"
                    class="relative z-20 px-5 py-2 bg-white text-red-600 rounded-lg font-semibold hover:bg-opacity-90 transition-all duration-300 transform hover:scale-105 shadow-md"
                    onclick="event.stopPropagation();">
                    {{ $actionText ?? 'Learn More' }}
                </a>
            @else
                <a href="#"
                    class="relative z-20 px-5 py-2 bg-white text-red-600 rounded-lg font-semibold hover:bg-opacity-90 transition-all duration-300 transform hover:scale-105 shadow-md"
                    onclick="event.stopPropagation();">
                    {{ $actionText ?? 'Learn More' }}
                </a>
            @endif
        </div>
    </div>
</div>