<div class="group relative h-96 w-72 [perspective:1000px]">
    <div
        class="absolute duration-1000 w-full h-full [transform-style:preserve-3d] group-hover:[transform:rotateX(180deg)]">
        <!-- Front Side with Gradient and Background Image -->
        <div class="absolute w-full h-full rounded-xl p-6 text-white [backface-visibility:hidden]" style="background-image: url('{{ $backgroundImageFront }}'), linear-gradient(to bottom right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7));
 background-size: contain; background-position: center; background-repeat: no-repeat;">
            <div class="flex flex-col h-full">
                <div class="flex justify-between items-start">
                    <div class="text-3xl font-bold">{{ $title ?? 'Card Title' }}</div>
                    <div class="text-5xl">{!! $emoji ?? '🌟' !!}</div>
                </div>
                <div class="mt-4">
                    <p class="text-lg">
                        {{ $frontContent ?? 'Front content goes here. This is visible before hovering.' }}
                    </p>
                </div>
                <div class="mt-auto hidden lg:block">
                    <p class="text-sm opacity-75">Hover Me!</p>
                </div>
            </div>
        </div>

        <!-- Back Side with Solid Black Background -->
        <div class="absolute w-full h-full rounded-xl p-6 text-white [transform:rotateX(180deg)] [backface-visibility:hidden]"
            style="background: linear-gradient(to bottom right, rgba(139, 0, 0, 0.7), rgba(105, 105, 105, 0.5));">
            <div class="flex flex-col h-full">
                <div class="text-2xl font-bold mb-4">Back Side</div>
                <div class="flex-grow">
                    <p class="text-lg">
                        {{ $backContent ?? 'Back content goes here. This is visible after hovering.' }}
                    </p>
                </div>
                <div class="flex justify-between items-center mt-auto">
                    <a href="{{ route($actionRoute) }}"
                        class="px-4 py-2 bg-white text-red-600 rounded-lg font-semibold hover:bg-opacity-90 transition-colors">
                        {{ $actionText }}
                    </a>

                    <span class="text-3xl">{!! $backEmoji ?? '✨' !!}</span>
                </div>
            </div>
        </div>
    </div>
</div>