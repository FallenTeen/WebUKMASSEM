<div>
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        @csrf

        <div class="card">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Tambahkan Program Kerja') }}
                </h2>
            </x-slot>

            <div class="card-body flex flex-col bg-white my-6 rounded-lg px-4 pb-8 md:px-8 shadow-md">
                <div class="px-4 py-8 max-w-4xl mx-auto">
                    <div class="relative">
                        <div class="absolute top-1/2 left-0 w-full h-1 bg-gray-200 transform -translate-y-1/2">
                            <div class="h-full bg-merah transition-all duration-500 ease-out"
                                style="width: {{ ($step - 1) * 50 }}%"></div>
                        </div>

                        <ol class="relative flex justify-between">
                            @foreach([['title' => 'Data Utama', 'description' => 'Masukkan Data Utama Proker'], ['title' => 'Data Lengkap', 'description' => 'Masukkan Data Lengkap Proker'], ['title' => 'Konfirmasi', 'description' => 'Konfirmasi Data Proker']] as $index => $stepItem)
                                @php $stepNumber = $index + 1; @endphp
                                <li class="flex flex-col items-center w-1/3">
                                    <!-- Step indicator -->
                                    <div class="mb-4 relative z-10">
                                        <div
                                            class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 
                                                          {{ $step >= $stepNumber ? 'bg-merah text-white shadow-lg' : 'bg-white border-2 border-gray-300 text-gray-400' }}
                                                          {{ $step == $stepNumber ? 'ring-4 ring-red-100 scale-125' : '' }}">
                                            @if($step > $stepNumber)
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            @else
                                                {{ $stepNumber }}
                                            @endif
                                        </div>
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
                    <!-- Step 1: Basic Information -->
                    @if ($step == 1)
                        <div class="w-full md:w-1/3">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold mb-2 text-gray-800">Gambar Utama</h3>
                                @if (!$gambar)
                                    <div class="w-full h-64 flex justify-center items-center relative border-2 border-gray-300 border-dashed rounded-lg p-6 hover:border-merah hover:bg-red-50 transition duration-300 ease-in-out group"
                                        id="dropzone">
                                        <input type="file" class="absolute inset-0 w-full h-full opacity-0 z-50 cursor-pointer"
                                            wire:model="gambar" id="file-upload" accept="image/*" />
                                        <div
                                            class="text-center items-center group-hover:scale-105 transition-transform duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="mx-auto h-12 w-12 text-gray-400 group-hover:text-merah transition-colors duration-300"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <h3 class="mt-2 text-sm font-medium text-gray-900">
                                                <label for="file-upload" class="relative cursor-pointer">
                                                    <span>Tarik gambar</span>
                                                    <span class="text-merah font-semibold"> atau telusuri</span>
                                                    <span>untuk upload</span>
                                                </label>
                                            </h3>
                                            <p class="mt-1 text-xs text-gray-500">PNG, JPG up to 8MB</p>
                                        </div>
                                    </div>
                                @endif

                                @if ($gambar)
                                    <div class="relative group rounded-lg overflow-hidden shadow-md">
                                        <img src="{{ $gambar->temporaryUrl() }}"
                                            class="mt-4 w-full h-64 object-cover cursor-pointer transition-transform duration-300 group-hover:scale-105"
                                            id="preview" onclick="document.getElementById('file-upload').click()">
                                        <input type="file" wire:model="gambar" id="file-upload" accept="image/*"
                                            class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer">
                                        <div
                                            class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50 cursor-pointer opacity-0 group-hover:opacity-100 duration-300 ease-in-out">
                                            <span class="text-white text-lg font-medium">Klik untuk ganti gambar</span>
                                        </div>
                                    </div>
                                    @error('gambar') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-col w-full md:w-2/3 gap-4">
                            <div class="flex items-center mb-6">
                                <div
                                    class="w-10 h-10 rounded-full flex items-center justify-center bg-merah text-white shadow-md">
                                    1
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-bold text-2xl text-gray-800">Masukkan Data Utama</h3>
                                    <p class="text-sm text-gray-600">Data-data seperti nama proker, tanggal dan kategori</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="mb-4">
                                    <label for="main_proker_id" class="block text-sm font-medium text-gray-700 mb-1">
                                        Kategori Utama Program Kerja
                                    </label>
                                    <div class="relative">
                                        <select wire:model="main_proker_id" id="main_proker_id"
                                            class="w-full form-select py-2 pl-3 pr-10 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-merah focus:border-merah text-gray-900 appearance-none">
                                            <option value="">Pilih Kategori Utama</option>
                                            @foreach ($allMainProkers as $mainProker)
                                                <option value="{{ $mainProker->id }}">{{ $mainProker->judul }}</option>
                                            @endforeach
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p
                                        class="mt-1 text-xs {{ $errors->has('main_proker_id') ? 'text-red-500' : 'text-gray-500' }}">
                                        {{ $errors->has('main_proker_id') ? $errors->first('main_proker_id') : 'Kategori berupa apa induk dari program ini' }}
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">
                                        Sub Kategori
                                    </label>
                                    <div class="relative">
                                        <select wire:model="kategori" id="kategori"
                                            class="w-full form-select py-2 pl-3 pr-10 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-merah focus:border-merah text-gray-900 appearance-none">
                                            <option value="">Pilih Sub Kategori</option>
                                            <option value="primer">Primer</option>
                                            <option value="sekunder">Sekunder</option>
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p
                                        class="mt-1 text-xs {{ $errors->has('kategori') ? 'text-red-500' : 'text-gray-500' }}">
                                        {{ $errors->has('kategori') ? $errors->first('kategori') : 'Pilih kategori utama untuk program ini' }}
                                    </p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="mb-4">
                                    <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">
                                        Judul Program Kerja
                                    </label>
                                    <input type="text" id="judul"
                                        class="form-control w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-merah focus:border-merah block p-2.5 transition duration-200"
                                        wire:model="judul" placeholder="Masukkan judul program kerja">
                                    <p class="mt-1 text-xs {{ $errors->has('judul') ? 'text-red-500' : 'text-gray-500' }}">
                                        {{ $errors->has('judul') ? $errors->first('judul') : 'Masukkan judul program kerja' }}
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">
                                        Tanggal Pelaksanaan
                                    </label>
                                    <div class="relative">
                                        <input onclick="this.showPicker()" type="date" id="tanggal"
                                            class="w-full rounded-lg form-control py-2 px-3 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-merah focus:border-merah bg-white"
                                            wire:model="tanggal">
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p
                                        class="mt-1 text-xs {{ $errors->has('tanggal') ? 'text-red-500' : 'text-gray-500' }}">
                                        {{ $errors->has('tanggal') ? $errors->first('tanggal') : 'Masukkan tanggal pelaksanaan kegiatan' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Step 2: Detailed Information -->
                    @if ($step == 2)
                        <div class="w-full">
                            <div class="flex items-center mb-6">
                                <div
                                    class="w-10 h-10 rounded-full flex items-center justify-center bg-merah text-white shadow-md">
                                    2
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-bold text-2xl text-gray-800">Masukkan Deskripsi Kegiatan</h3>
                                    <p class="text-sm text-gray-600">Data-data seperti deskripsi kegiatan, dokumentasi dan
                                        tag</p>
                                </div>
                            </div>
                            <div class="mb-8">
                                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                                    Deskripsi Program Kerja
                                </label>
                                <div
                                    class="rounded-lg border border-gray-300 overflow-hidden shadow-sm focus-within:ring-2 focus-within:ring-merah focus-within:border-merah">
                                    <textarea id="deskripsi" wire:model="deskripsi"
                                        class="w-full min-h-[250px] p-4 border-0 focus:ring-0 prose max-w-none"
                                        placeholder="Masukkan deskripsi program kerja"></textarea>
                                </div>
                                @error('deskripsi')
                                    <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">Deskripsi harus menjelaskan detail program kerja
                                    dengan jelas</p>
                            </div>
                            <div class="mb-8">
                                <h3 class="block text-base font-medium text-gray-700 mb-3">Gambar Dokumentasi Kegiatan</h3>
                                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                                    @foreach($gambardesk as $image)
                                        <div class="relative group">
                                            <div
                                                class="rounded-lg overflow-hidden border border-gray-300 shadow-sm aspect-square">
                                                <a href="{{ Storage::url($image->path) }}" target="_blank">
                                                    <img src="{{ Storage::url($image->path) }}" alt="Dokumentasi"
                                                        class="w-full h-full object-cover transition duration-300 group-hover:scale-105" />
                                                </a>
                                            </div>
                                            <button type="button" wire:click="removeGambardesk({{ $image->id }})"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 transition duration-300 shadow transform hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18 18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    @endforeach
                                    <div class="aspect-square">
                                        <label for="gallery-upload"
                                            class="flex flex-col items-center justify-center w-full h-full border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 hover:border-merah transition duration-300">
                                            <div class="flex flex-col items-center justify-center p-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 text-gray-400 mb-2 group-hover:text-merah">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <p class="text-xs text-gray-500 text-center">Tambah Gambar</p>
                                            </div>
                                            <input type="file" wire:model="gambardeskFiles" multiple id="gallery-upload"
                                                class="hidden" accept="image/*" />
                                        </label>
                                    </div>
                                </div>
                                @error('gambardeskFiles.*')
                                    <p class="mt-1 text-red-500 text-xs">{{ $error->message }}</p>
                                @enderror
                                <p class="mt-2 text-xs text-gray-500">Unggah gambar dokumentasi kegiatan (maksimal 5MB per
                                    gambar)</p>
                            </div>
                            <div class="mb-6">
                                <label for="tagInput" class="block text-base font-medium text-gray-700 mb-2">
                                    Tags <span class="text-xs text-gray-500 ml-1">(Maksimal 5 tags)</span>
                                </label>
                                <div class="rounded-lg border border-gray-300 bg-white p-4 shadow-sm">
                                    <div class="flex items-center space-x-2">
                                        <div class="flex-grow relative">
                                            <input type="text" id="tagInput" wire:model.live="tagInput"
                                                wire:keydown.enter.prevent="addTag"
                                                placeholder="Tambahkan tag (maksimal 50 karakter)" maxlength="50"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-merah focus:border-merah transition duration-300" />
                                            <div
                                                class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <span class="text-gray-400 text-xs">
                                                    {{ strlen($tagInput) }}/50
                                                </span>
                                            </div>
                                        </div>

                                        <button type="button" wire:click="addTag"
                                            class="p-2 bg-merah text-white rounded-md hover:bg-red-600 transition duration-300 shadow-sm flex items-center"
                                            aria-label="Add Tag" title="Add Tag">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 group-hover:rotate-90 transition duration-300" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>
                                            <span class="ml-1 hidden sm:inline">Tambah</span>
                                        </button>
                                    </div>

                                    @error('tagInput')
                                        <p class="text-red-500 text-xs mt-1">{{ $error->message }}</p>
                                    @enderror
                                    @if (session()->has('tag_error'))
                                        <p class="text-red-500 text-xs mt-1">{{ session('tag_error') }}</p>
                                    @endif
                                    <div class="mt-4 flex flex-wrap gap-2">
                                        @forelse ($tags as $index => $tag)
                                            <div
                                                class="inline-flex items-center bg-gray-100 text-gray-800 rounded-full pl-3 pr-1 py-1 text-sm hover:bg-gray-200 transition duration-300 group animate-fade-in shadow-sm">
                                                <span class="mr-2">{{ $tag }}</span>
                                                <button type="button" wire:click="removeTag({{ $index }})"
                                                    class="text-red-500 hover:text-white hover:bg-red-500 focus:outline-none rounded-full transition duration-300 p-1"
                                                    aria-label="Remove Tag" title="Remove Tag">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                        @empty
                                            <p class="text-gray-500 text-sm italic">Belum ada tag yang ditambahkan</p>
                                        @endforelse
                                    </div>
                                    <p class="mt-2 text-xs text-gray-500">Tag akan membantu pengguna menemukan program kerja
                                        dengan lebih mudah</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($step == 3)
                        <div class="w-full flex flex-col md:flex-row gap-6 mt-6">
                            <div class="w-full md:w-1/3 flex flex-col gap-6">
                                <div class="bg-white p-4 rounded-lg shadow-md">
                                    <h3 class="font-semibold text-lg text-gray-800 mb-3">Gambar Utama</h3>
                                    <div class="relative rounded-lg overflow-hidden">
                                        @if ($gambar)
                                            <img src="{{ $gambar->temporaryUrl() }}"
                                                class="w-full h-48 object-cover rounded-lg shadow-md" id="preview">
                                        @else
                                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded-lg">
                                                <span class="text-gray-500 text-sm">Tidak ada gambar utama</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="bg-white p-4 rounded-lg shadow-md">
                                    <h3 class="font-semibold text-lg text-gray-800 mb-3">Galeri Dokumentasi</h3>
                                    <div class="grid grid-cols-2 gap-2" id="gambar-desk-container">
                                        @if(count($gambardesk) > 0 || count($gambardeskFiles) > 0)
                                            @foreach($gambardesk as $image)
                                                <div class="aspect-square rounded-lg overflow-hidden shadow-sm">
                                                    <img src="{{ Storage::url($image->path) }}" alt="Dokumentasi"
                                                        class="w-full h-full object-cover" />
                                                </div>
                                            @endforeach

                                            @foreach($gambardeskFiles as $file)
                                                <div class="aspect-square rounded-lg overflow-hidden shadow-sm">
                                                    <img src="{{ $file->temporaryUrl() }}" alt="Dokumentasi"
                                                        class="w-full h-full object-cover" />
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col-span-2 text-center py-4">
                                                <span class="text-gray-500 text-sm italic">Tidak ada gambar dokumentasi</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-2/3 bg-white p-6 rounded-lg shadow-md">
                                <div class="flex items-center mb-6">
                                    <div
                                        class="w-10 h-10 rounded-full flex items-center justify-center bg-merah text-white shadow-md">
                                        3
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="font-bold text-2xl text-gray-800">Konfirmasi Data</h3>
                                        <p class="text-sm text-gray-600">Pastikan data program kerja sudah benar sebelum
                                            disimpan</p>
                                    </div>
                                </div>

                                <div class="divide-y divide-gray-200">
                                    <div class="py-3 flex flex-col sm:flex-row">
                                        <div class="w-full sm:w-1/3 font-medium text-gray-700">Judul Main Proker</div>
                                        <div class="w-full sm:w-2/3 text-gray-800">
                                            {{ $allMainProkers->firstWhere('id', $main_proker_id)->judul ?? 'Belum dipilih' }}
                                        </div>
                                    </div>

                                    <div class="py-3 flex flex-col sm:flex-row">
                                        <div class="w-full sm:w-1/3 font-medium text-gray-700">Kategori</div>
                                        <div class="w-full sm:w-2/3 text-gray-800">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $kategori == 'primer' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                {{ ucfirst($kategori ?: 'Belum dipilih') }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="py-3 flex flex-col sm:flex-row">
                                        <div class="w-full sm:w-1/3 font-medium text-gray-700">Judul Proker</div>
                                        <div class="w-full sm:w-2/3 text-gray-800 font-semibold">
                                            {{ $judul ?: 'Belum diisi' }}
                                        </div>
                                    </div>

                                    <div class="py-3 flex flex-col sm:flex-row">
                                        <div class="w-full sm:w-1/3 font-medium text-gray-700">Tanggal Pelaksanaan</div>
                                        <div class="w-full sm:w-2/3 text-gray-800">
                                            @if($tanggal)
                                                <span class="inline-flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    {{ \Carbon\Carbon::parse($tanggal)->format('d F Y') }}
                                                </span>
                                            @else
                                                <span class="text-gray-500 italic">Belum diisi</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="py-3 flex flex-col sm:flex-row">
                                        <div class="w-full sm:w-1/3 font-medium text-gray-700">Tags</div>
                                        <div class="w-full sm:w-2/3">
                                            <div class="flex flex-wrap gap-2">
                                                @forelse ($tags as $tag)
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                        {{ $tag }}
                                                    </span>
                                                @empty
                                                    <span class="text-gray-500 italic">Tidak ada tag</span>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-3">
                                        <div class="font-medium text-gray-700 mb-2">Deskripsi</div>
                                        <div
                                            class="prose prose-sm max-w-none border border-gray-200 rounded-lg p-4 bg-gray-50">
                                            @if($deskripsi)
                                                <div class="trix-content">
                                                    {!! $deskripsi !!}
                                                </div>
                                            @else
                                                <p class="text-gray-500 italic">Belum diisi</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mt-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <div class="ml-3">
                                                <h3 class="text-sm font-medium text-yellow-800">Peringatan</h3>
                                                <div class="mt-2 text-sm text-yellow-700">
                                                    <p>Pastikan semua data yang telah dimasukkan sudah benar. Program kerja
                                                        yang telah disimpan dapat diubah kemudian.</p>
                                                </div>
                                                <div class="mt-4">
                                                    <div class="flex items-center">
                                                        <input id="confirm" name="confirm" type="checkbox"
                                                            wire:model="confirmCheck"
                                                            class="h-4 w-4 text-merah focus:ring-merah border-gray-300 rounded">
                                                        <label for="confirm" class="ml-2 block text-sm text-gray-900">
                                                            Saya menyatakan bahwa data yang diisi sudah benar
                                                        </label>
                                                    </div>
                                                    @error('confirmCheck')
                                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endif
                    </div>


                </div>
                <div class="flex justify-center gap-4 mt-8 mb-12">
                    @if($step > 1)
                        <button type="button" wire:click="prevStep"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-merah transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Kembali
                        </button>
                    @else
                        <div></div>
                    @endif

                    @if($step < 3)
                        <button type="button" wire:click="nextStep"
                            class="inline-flex mb-12 items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-merah hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-merah transition-all duration-300">
                            Lanjut
                            <svg xmlns="http://www.w3.org/2000/svg" class="-mr-1 ml-2 h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    @else
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-merah">
                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan Program Kerja
                        </button>
                    @endif
                </div>
            </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropzone = document.getElementById('dropzone');
        if (dropzone) {
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropzone.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                dropzone.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropzone.addEventListener(eventName, unhighlight, false);
            });

            function highlight() {
                dropzone.classList.add('border-merah', 'bg-red-50');
            }

            function unhighlight() {
                dropzone.classList.remove('border-merah', 'bg-red-50');
            }

            dropzone.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                const files = e.dataTransfer.files;
                document.getElementById('file-upload').files = files;
                document.getElementById('file-upload').dispatchEvent(new Event('change'));
            }
        }

        window.addEventListener('livewire-upload-progress', event => {
        });
    });
</script>