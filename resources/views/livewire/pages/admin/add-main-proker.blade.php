<div>
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        @csrf

        <div class="card">
            <x-slot name="header">
                <div class="flex justify-between items-center">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Tambah Program Utama') }}
                    </h2>
                    <span class="text-sm font-medium text-gray-500">Langkah {{ $step }} dari {{ $totalSteps }}</span>
                </div>
            </x-slot>

            <div class="card-body flex flex-col bg-white my-6 rounded-lg px-4 pb-8 md:px-8 shadow-md">
                <div class="px-4 py-8 max-w-4xl mx-auto w-full">
                    <div class="relative">
                        <div
                            class="absolute top-1/2 left-0 w-full h-1 bg-gray-200 transform -translate-y-1/2 rounded-full">
                            <div class="h-full bg-merah transition-all duration-500 ease-out rounded-full"
                                style="width: {{ (($step - 1) / ($totalSteps - 1)) * 100 }}%"></div>
                        </div>
                        <ol class="relative flex justify-between">
                            @foreach([['title' => 'Informasi Utama', 'description' => 'Data dasar program'], ['title' => 'Detail Acara', 'description' => 'Waktu & lokasi'], ['title' => 'Lampiran', 'description' => 'Dokumentasi & konfirmasi']] as $index => $stepItem)
                                @php $stepNumber = $index + 1; @endphp
                                <li class="flex flex-col items-center">
                                    <div class="mb-4 relative z-10">
                                        <button type="button" wire:click="$set('step', {{ $stepNumber }})" class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 
                                                        {{ $step >= $stepNumber ? 'bg-merah text-white shadow-lg' : 'bg-white border-2 border-gray-300 text-gray-400' }}
                                                        {{ $step == $stepNumber ? 'ring-4 ring-red-100 scale-125' : '' }}
                                                        focus:outline-none">
                                            @if($step > $stepNumber)
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            @else
                                                {{ $stepNumber }}
                                            @endif
                                        </button>
                                    </div>
                                    <div class="text-center px-2">
                                        <p
                                            class="text-sm font-semibold {{ $step >= $stepNumber ? 'text-gray-800' : 'text-gray-400' }}">
                                            {{ $stepItem['title'] }}
                                        </p>
                                        <p
                                            class="hidden md:block mt-1 text-xs {{ $step >= $stepNumber ? 'text-gray-600' : 'text-gray-400' }}">
                                            {{ $stepItem['description'] }}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>

                <div class="w-full flex flex-col md:flex-row gap-8">
                    @if ($step == 1)
                                            <div class="w-full flex flex-col gap-6" x-data="{ showInfoTooltip: false }">
                                                <div class="flex items-center mb-6">
                                                    <div
                                                        class="w-10 h-10 rounded-full flex items-center justify-center bg-merah text-white shadow-md">
                                                        1
                                                    </div>
                                                    <div class="ml-4">
                                                        <h3 class="font-bold text-2xl text-gray-800">Informasi Dasar Program</h3>
                                                        <p class="text-sm text-gray-600">Isi data utama program kerja</p>
                                                    </div>
                                                </div>

                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                   
                                                    <div class="md:col-span-2">
                                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                                            Gambar Utama
                                                            <span class="text-xs text-gray-500 ml-1">(Maks. 8MB)</span>
                                                        </label>
                                                        <div class="relative group rounded-lg overflow-hidden shadow-md">
                                                            @if ($gambar)
                                                                <img src="{{ $gambar->temporaryUrl() }}"
                                                                    class="w-full h-64 object-cover cursor-pointer transition-transform duration-300 group-hover:scale-105"
                                                                    onclick="document.getElementById('gambar-upload').click()">
                                                                <button type="button" wire:click="$set('gambar', null)"
                                                                    class="absolute top-2 right-2 bg-red-600 text-white rounded-full p-1 shadow hover:bg-red-700 transition">
                                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                            d="M6 18L18 6M6 6l12 12" />
                                                                    </svg>
                                                                </button>
                                                            @else
                                                                <div class="w-full h-64 bg-gray-100 flex items-center justify-center cursor-pointer transition-all hover:bg-gray-200"
                                                                    onclick="document.getElementById('gambar-upload').click()">
                                                                    <div class="text-center p-4">
                                                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none"
                                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                        </svg>
                                                                        <span class="mt-2 block text-sm font-medium text-gray-900">
                                                                            Klik untuk upload gambar
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <input type="file" wire:model.live="gambar" id="gambar-upload" class="hidden"
                                                                accept="image/*">
                                                        </div>
                                                        @error('gambar') <span class="text-red-500 text-sm mt-1">{{ $error->message }}</span> @enderror
                                                    </div>
                                                    <div>
                                                        <label for="judul" class="block text-sm font-medium text-gray-700">
                                                            Judul Utama <span class="text-red-500">*</span>
                                                        </label>
                                                        <input type="text" wire:model.blur="judul" id="judul"
                                                            class="mt-1 block w-full rounded-md shadow-sm 
                                                                          {{ $errors->has('judul') ? 'border-red-300 focus:border-red-500 focus:ring-red-500' : 'border-gray-300 focus:border-merah focus:ring-merah' }}"
                                                            placeholder="Masukkan judul program">
                                                        @error('judul') <span class="text-red-500 text-sm mt-1">{{ $error->message }}</span> @enderror
                                                    </div>

                                                    <div>
                                                        <label for="judul2" class="block text-sm font-medium text-gray-700">
                                                            Sub Judul
                                                            <span class="text-xs text-gray-500">(opsional)</span>
                                                        </label>
                                                        <input type="text" wire:model.blur="judul2" id="judul2"
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-merah focus:ring-merah"
                                                            placeholder="Masukkan sub judul jika ada">
                                                        @error('judul2') <span class="text-red-500 text-sm mt-1">{{ $error->message }}</span> @enderror
                                                    </div>

                                                    <div class="md:col-span-2">
                                                        <label for="kategori" class="block text-sm font-medium text-gray-700">
                                                            Kategori <span class="text-red-500">*</span>
                                                        </label>
                                                        <div class="relative">
                                                            <select wire:model.blur="kategori" id="kategori"
                                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-merah focus:ring-merah">
                                                                <option value="edukasi">Edukasi</option>
                                                                <option value="sosial">Sosial</option>
                                                                <option value="budaya">Budaya</option>
                                                                <option value="olahraga">Olahraga</option>
                                                                <option value="teknologi">Teknologi</option>
                                                                <option value="lainnya">Lainnya</option>
                                                            </select>
                                                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="M19 9l-7 7-7-7" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        @error('kategori') <span class="text-red-500 text-sm mt-1">{{ $error->message }}</span> @enderror
                                                    </div>
                                                    <div class="md:col-span-2">
                                                        <div class="flex justify-between">
                                                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">
                                                                Deskripsi <span class="text-red-500">*</span>
                                                            </label>
                                                            <span class="text-xs text-gray-500" x-show="$wire.deskripsi">
                                                                {{ strlen($deskripsi) }} karakter
                                                            </span>
                                                        </div>
                                                        <textarea wire:model.blur="deskripsi" id="deskripsi" rows="6"
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-merah focus:ring-merah"
                                                            placeholder="Jelaskan informasi tentang program ini secara detail"></textarea>
                                                        @error('deskripsi') <span class="text-red-500 text-sm mt-1">{{ $error->message }}</span
                                                        >                                @enderror
                                                    </div>
                                                </div>
                                            </div>
                    @endif
                    @if ($step == 2)
                                            <div class="w-full flex flex-col gap-6">
                                                <div class="flex items-center mb-6">
                                                    <div
                                                        class="w-10 h-10 rounded-full flex items-center justify-center bg-merah text-white shadow-md">
                                                        2
                                                    </div>
                                                    <div class="ml-4">
                                                        <h3 class="font-bold text-2xl text-gray-800">Detail Acara</h3>
                                                        <p class="text-sm text-gray-600">Isi informasi waktu dan lokasi</p>
                                                    </div>
                                                </div>

                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                    <div class="md:col-span-2 bg-gray-50 p-4 rounded-lg border border-gray-200">
                                                        <h4 class="font-semibold text-lg text-gray-700 mb-3">Waktu Pelaksanaan</h4>

                                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                            <div>
                                                                <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">
                                                                    Tanggal Mulai <span class="text-red-500">*</span>
                                                                </label>
                                                                <div class="relative">
                                                                    <div
                                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                                            viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2"
                                                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                        </svg>
                                                                    </div>
                                                                    <input type="date" wire:model.blur="tanggal_mulai" id="tanggal_mulai"
                                                                        class="mt-1 pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-merah focus:ring-merah">
                                                                </div>
                                                                @error('tanggal_mulai') <spa
                                                                 n                               class="text-red-500 text-sm mt-1">{{ $error->message }}</span> @enderror
                                                            </div>

                                                            <div>
                                                                <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700">
                                                                    Tanggal Selesai <span class="text-red-500">*</span>
                                                                </label>
                                                                <div class="relative">
                                                                    <div
                                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                                            viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2"
                                                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                        </svg>
                                                                    </div>
                                                                    <input type="date" wire:model.blur="tanggal_selesai" id="tanggal_selesai"
                                                                        class="mt-1 pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-merah focus:ring-merah">
                                                                </div>
                                                                @error('tanggal_selesai') <spa
                                                                  n                      class="text-red-500 text-sm mt-1">{{ $error->message }}</span> @enderror
                                                            </div>
                                                            <div>
                                                                <label for="waktu_mulai" class="block text-sm font-medium text-gray-700">
                                                                    Waktu Mulai <span class="text-red-500">*</span>
                                                                </label>
                                                                <div class="relative">
                                                                    <div
                                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                                            viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2"
                                                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                        </svg>
                                                                    </div>
                                                                    <input type="time" wire:model.blur="waktu_mulai" id="waktu_mulai"
                                                                        class="mt-1 pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-merah focus:ring-merah">
                                                                </div>
                                                                @error('waktu_mulai') <spa
                                                                  n                  class="text-red-500 text-sm mt-1">{{ $error->message }}</span> @enderror
                                                            </div>

                                                            <div>
                                                                <label for="waktu_selesai" class="block text-sm font-medium text-gray-700">
                                                                    Waktu Selesai <span class="text-red-500">*</span>
                                                                </label>
                                                                <div class="relative">
                                                                    <div
                                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                                            viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2"
                                                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                        </svg>
                                                                    </div>
                                                                    <input type="time" wire:model.blur="waktu_selesai" id="waktu_selesai"
                                                                        class="mt-1 pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-merah focus:ring-merah">
                                                                </div>
                                                                @error('waktu_selesai') <spa
                                                                   n         class="text-red-500 text-sm mt-1">{{ $error->message }}</span> @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="md:col-span-2 bg-gray-50 p-4 rounded-lg border border-gray-200">
                                                        <h4 class="font-semibold text-lg text-gray-700 mb-3">Lokasi Acara</h4>

                                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                            <div>
                                                                <label for="lokasi" class="block text-sm font-medium text-gray-700">
                                                                    Nama Lokasi <span class="text-red-500">*</span>
                                                                </label>
                                                                <div class="relative">
                                                                    <div
                                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                                            viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2"
                                                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                        </svg>
                                                                    </div>
                                                                    <input type="text" wire:model.blur="lokasi" id="lokasi"
                                                                        class="mt-1 pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-merah focus:ring-merah"
                                                                        placeholder="Contoh: Gedung ABC, Taman Kota">
                                                                </div>
                                                                @error('lokasi') <span class="text-red-500 text-sm mt-1">{{ $error->message }}</span
                                                                  >                          @enderror
                                                            </div>

                                                            <div>
                                                                <label for="kota" class="block text-sm font-medium text-gray-700">
                                                                    Kota/Kabupaten <span class="text-red-500">*</span>
                                                                </label>
                                                                <input type="text" wire:model.blur="kota" id="kota"
                                                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-merah focus:ring-merah"
                                                                    placeholder="Masukkan nama kota">
                                                                @error('kota') <span class="text-red-500 text-sm mt-1">{{ $error->message }}</span
                                                                  >  @enderror
                                                            </div>

                                                            <div class="md:col-span-2">
                                                                <label for="alamat_lengkap" class="block text-sm font-medium text-gray-700">
                                                                    Alamat Lengkap <span class="text-red-500">*</span>
                                                                </label>
                                                                <textarea wire:model.blur="alamat_lengkap" id="alamat_lengkap" rows="3"
                                                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-merah focus:ring-merah"
                                                                    placeholder="Masukkan alamat lengkap lokasi acara"></textarea>
                                                                @error('alamat_lengkap') <spa
                                                                  n                                      class="text-red-500 text-sm mt-1">{{ $error->message }}</span> @enderror
                                                            </div>
                                                            <div class="md:col-span-2">
                                                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                                                    Peta Lokasi <span class="text-xs text-gray-500">(opsional)</span>
                                                                </label>
                                                                <div class="relative h-64 bg-gray-100 rounded-lg border border-gray-300">
                                                                    <div id="map" class="w-full h-full rounded-lg"></div>
                                                                    <div class="absolute bottom-2 right-2">
                                                                        <button type="button" id="set-location"
                                                                            class="px-3 py-1.5 bg-white text-gray-700 border border-gray-300 rounded-md shadow-sm text-sm font-medium hover:bg-gray-50">
                                                                            <div class="flex items-center">
                                                                                <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor"
                                                                                    viewBox="0 0 24 24">
                                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                                        stroke-width="2"
                                                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                                                </svg>
                                                                                Pilih Lokasi
                                                                            </div>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2 flex gap-4">
                                                                    <div class="w-1/2">
                                                                        <label for="latitude"
                                                                            class="block text-xs font-medium text-gray-500">Latitude</label>
                                                                        <input type="text" wire:model.blur="latitude" id="latitude"
                                                                            class="mt-1 block w-full rounded-md border-gray-300 text-sm shadow-sm focus:border-merah focus:ring-merah"
                                                                            placeholder="-6.2088" readonly>
                                                                    </div>
                                                                    <div class="w-1/2">
                                                                        <label for="longitude"
                                                                            class="block text-xs font-medium text-gray-500">Longitude</label>
                                                                        <input type="text" wire:model.blur="longitude" id="longitude"
                                                                            class="mt-1 block w-full rounded-md border-gray-300 text-sm shadow-sm focus:border-merah focus:ring-merah"
                                                                            placeholder="106.8456" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="md:col-span-2 bg-gray-50 p-4 rounded-lg border border-gray-200">
                                                        <h4 class="font-semibold text-lg text-gray-700 mb-3">Informasi Tambahan</h4>

                                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                            <div>
                                                                <label for="biaya_tiket" class="block text-sm font-medium text-gray-700">
                                                                    Biaya Tiket (Rp)
                                                                    <span class="text-xs text-gray-500">(masukkan 0 jika gratis)</span>
                                                                </label>
                                                                <div class="relative mt-1">
                                                                    <div
                                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                        <span class="text-gray-500 sm:text-sm">Rp</span>
                                                                    </div>
                                                                    <input type="number" wire:model.blur="biaya_tiket" id="biaya_tiket"
                                                                        class="pl-12 block w-full rounded-md border-gray-300 shadow-sm focus:border-merah focus:ring-merah"
                                                                        placeholder="0">
                                                                    <div
                                                                        class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                                        <span class="text-gray-500 sm:text-sm">.00</span>
                                                                    </div>
                                                                </div>
                                                                @error('biaya_tiket') <spa
                                                                n                        class="text-red-500 text-sm mt-1">{{ $error->message }}</span> @enderror
                                                            </div>

                                                            <div>
                                                                <label for="kontak_info" class="block text-sm font-medium text-gray-700">
                                                                    Kontak Informasi <span class="text-red-500">*</span>
                                                                </label>
                                                                <div class="relative">
                                                                    <div
                                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                                            viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2"
                                                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                                        </svg>
                                                                    </div>
                                                                    <input type="text" wire:model.blur="kontak_info" id="kontak_info"
                                                                        class="mt-1 pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-merah focus:ring-merah"
                                                                        placeholder="0812 3456 7890 / email@example.com">
                                                                </div>
                                                                @error('kontak_info') <spa
                                                                n                                            class="text-red-500 text-sm mt-1">{{ $error->message }}</span> @enderror
                                                            </div>

                                                            <div class="md:col-span-2">
                                                                <label for="url" class="block text-sm font-medium text-gray-700">
                                                                    URL Pendaftaran
                                                                    <span class="text-xs text-gray-500">(opsional)</span>
                                                                </label>
                                                                <div class="relative">
                                                                    <div
                                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                                            viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2"
                                                                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                                                        </svg>
                                                                    </div>
                                                                    <input type="url" wire:model.blur="url" id="url"
                                                                        class="mt-1 pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-merah focus:ring-merah"
                                                                        placeholder="https://example.com/register">
                                                                </div>
                                                                @error('url') <span class="text-red-500 text-sm mt-1">{{ $error->message }}</span
                                                                  >                          @enderror
                                                            </div>

                                                            <div class="md:col-span-2">
                                                                <label for="kuota_peserta" class="block text-sm font-medium text-gray-700">
                                                                    Kuota Peserta
                                                                    <span class="text-xs text-gray-500">(opsional)</span>
                                                                </label>
                                                                <div class="relative">
                                                                    <div
                                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                                            viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2"
                                                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                                        </svg>
                                                                    </div>
                                                                    <input type="number" wire:model.blur="kuota_peserta" id="kuota_peserta"
                                                                        class="mt-1 pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-merah focus:ring-merah"
                                                                        placeholder="Masukkan jumlah maksimal peserta">
                                                                </div>
                                                                @error('kuota_peserta') <spa
                                                                n            class="text-red-500 text-sm mt-1">{{ $error->message }}</span> @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                    @endif