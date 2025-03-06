<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $proker->judul }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.9.1/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold mb-4" x-data x-text="$store.proker.judul"></h1>
            <div class="text-gray-700">
                <p class="mb-4">{{ $proker->deskripsi }}</p>
                <div class="mb-4">
                    <img src="{{ $proker->gambarUrl }}" alt="{{ $proker->judul }}" class="w-full h-auto rounded-lg">
                </div>
                <div x-data="{ gambardesk: {{ json_encode($proker->gambardeskUrl) }} }">
                    <template x-for="gambar in gambardesk" :key="gambar">
                        <img :src="gambar" alt="{{ $proker->judul }}" class="w-full h-auto rounded-lg mb-4">
                    </template>
                </div>
                <div class="text-sm text-gray-500">
                    <span>Kategori: {{ $proker->kategori }}</span> |
                    <span>Tanggal: {{ $proker->tanggal->format('d M Y') }}</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>