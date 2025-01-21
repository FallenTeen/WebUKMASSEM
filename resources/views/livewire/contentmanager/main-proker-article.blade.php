<div class="article-container">
    @if($proker)
        <h1 class="text-4xl font-bold">{{ $proker->judul2 }}</h1>
        <p class="mt-4 text-lg">{{ $proker->deskripsi }}</p>
        <img src="{{ asset('storage/' . $proker->gambar) }}" alt="Gambar Artikel" class="mt-6 rounded-lg">
        <p class="mt-4">{{ $proker->gambardesk }}</p>
    @else
        <p>Artikel tidak ditemukan.</p>
    @endif
</div>