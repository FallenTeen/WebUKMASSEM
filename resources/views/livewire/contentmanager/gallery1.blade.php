@php
    $items = [
        [
            'title' => 'Paris',
            'description' => 'City of Love',
            'image' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a',
        ],
        [
            'title' => 'Paris',
            'description' => 'City of Love',
            'image' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a',
        ],
        [
            'title' => 'Paris',
            'description' => 'City of Love',
            'image' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a',
        ],
        [
            'title' => 'Paris',
            'description' => 'City of Love',
            'image' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a',
        ],
        [
            'title' => 'Paris',
            'description' => 'City of Love',
            'image' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a',
        ],
        [
            'title' => 'Paris',
            'description' => 'City of Love',
            'image' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a',
        ],
        [
            'title' => 'Paris',
            'description' => 'City of Love',
            'image' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a',
        ],
        [
            'title' => 'Paris',
            'description' => 'City of Love',
            'image' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a',
        ],
        [
            'title' => 'Paris',
            'description' => 'City of Love',
            'image' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a',
        ],
        [
            'title' => 'Paris',
            'description' => 'City of Love',
            'image' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a',
        ],
        [
            'title' => 'Paris',
            'description' => 'City of Love',
            'image' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a',
        ],
        [
            'title' => 'Paris',
            'description' => 'City of Love',
            'image' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a',
        ],
        [
            'title' => 'Paris',
            'description' => 'City of Love',
            'image' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a',
        ],
        [
            'title' => 'Paris',
            'description' => 'City of Love',
            'image' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a',
        ],
        [
            'title' => 'Paris',
            'description' => 'City of Love',
            'image' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a',
        ],
        [
            'title' => 'Paris',
            'description' => 'City of Love',
            'image' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a',
        ],
        [
            'title' => 'Paris',
            'description' => 'City of Love',
            'image' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a',
        ],
        [
            'title' => 'Paris',
            'description' => 'City of Love',
            'image' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a',
        ],
        [
            'title' => 'Paris',
            'description' => 'City of Love',
            'image' => 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a',
        ],
    ];
@endphp

<div class="grid grid-cols-4 grid-rows-6 gap-4">
    @foreach ($items as $index => $item)
        <div class="relative group {{ $index % 2 == 0 ? 'col-span-1 row-span-2' : '' }}">
            <img class="h-full object-cover rounded-lg" src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
            <div
                class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <h3 class="text-lg font-bold">{{ $item['title'] }}</h3>
                <p class="text-sm">{{ $item['description'] }}</p>
            </div>
        </div>

    @endforeach
</div>