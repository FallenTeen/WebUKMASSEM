<body class="bg-gray-100 text-gray-800">
    <div class="article-container bg-white relative overflow-hidden">
        @if($proker)
            <div class="relative h-[400px] w-full">
                <img src="{{ asset('images/proker-1.jpg') }}" alt="Gambar Artikel"
                    class="absolute inset-0 object-cover w-full h-full">
                <div
                    class="absolute inset-0 bg-gradient-to-b from-transparent to-white flex items-center justify-center z-20">
                    <h1 class="text-6xl font-bold text-center text-black">{{ $proker->judul2 }}</h1>
                </div>
            </div>
            <div class="p-6">
                <div class="flex flex-col px-24 ">
                    <p class="font-bold text-2xl">{{$proker->judul2}}</p>
                    <p class="mt-4 text-lg text-justify text-gray-900 indent-6">{{ $proker->deskripsi }}</p>
                </div>
            </div>
            <p class="mt-4 text-gray-900">{{ $proker->gambardesk }}</p>
        @else
            <p class="text-center text-red-500">Artikel tidak ditemukan.</p>
        @endif
    </div>
</body>