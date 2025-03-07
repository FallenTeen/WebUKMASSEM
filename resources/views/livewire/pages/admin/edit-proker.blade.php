<div class="bg-gray-50 min-h-screen py-10">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <x-slot name="header">
            <h2 class="font-bold text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tambahkan Program Kerja') }}
            </h2>
        </x-slot>

        <form wire:submit.prevent="save" class="space-y-8">
            <!-- Data Utama Card -->
            <div
                class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden transform transition hover:shadow-lg">
                <div class="border-b border-gray-100 bg-gray-50 px-6 py-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-merah mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-800">Data Utama</h2>
                </div>
                <div class="p-6">
                    <div class="flex flex-col md:flex-row md:space-x-8">
                        <div class="md:w-1/3 mb-6 md:mb-0">
                            <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Gambar
                                Utama</label>
                            @if($existingGambar)
                                <div class="relative h-72 w-full rounded-lg border-2 border-gray-200 overflow-hidden group">
                                    <img src="{{ Storage::url($existingGambar) }}" alt="Gambar Proker"
                                        class="h-full w-full object-cover transition-all duration-300 group-hover:opacity-80 group-hover:scale-105">
                                    <label for="gambar"
                                        class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 cursor-pointer transition-all duration-300">
                                        <div class="bg-black bg-opacity-50 p-3 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                    </label>

                                    <input id="gambar" wire:model="gambar" type="file" class="hidden" />
                                </div>
                            @else
                                <div class="h-72 w-full">
                                    <label
                                        class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-all duration-300">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <div class="bg-blue-50 p-4 rounded-full mb-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-merah"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                </svg>
                                            </div>
                                            <p class="mb-2 text-sm font-medium text-gray-700">Klik untuk upload</p>
                                            <p class="mb-1 text-xs text-gray-500">atau drag and drop</p>
                                            <p class="text-xs text-gray-400">PNG, JPG, GIF (Max. 8MB)</p>
                                        </div>
                                        <input id="gambar" wire:model="gambar" type="file" class="hidden" />
                                    </label>
                                </div>
                            @endif

                            <div wire:loading wire:target="gambar"
                                class="mt-3 text-sm text-merah flex items-center justify-center p-2 bg-red-50 rounded-md">
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-merah"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Mengupload gambar...
                            </div>
                            @error('gambar') <spa
                                   n class="text-red-500 text-sm mt-2 block bg-red-50 p-2 rounded-md">{{ $message }}</span
                               > @enderror
                        </div>
                        <div class="md:w-2/3">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="space-y-2">
                                    <label for="main_proker_id" class="block text-sm font-medium text-gray-700">
                                        Program Kerja Utama <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <select id="main_proker_id" wire:model="main_proker_id"
                                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-merah focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-3">
                                            <option value="">Pilih Program Kerja Utama</option>
                                            @foreach($allMainProkers as $mainProker)
                                                <option value="{{ $mainProker->id }}">{{ $mainProker->name }}</option>
                                            @endforeach
                                        </select>
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    @error('main_proker_id') <spa
                                           n class="text-red-500 text-sm mt-1 block bg-red-50 p-2 rounded-md">{{ $message }}</span
                                       > @enderror
                                </div>
                                <div class="space-y-2">
                                    <label for="judul" class="block text-sm font-medium text-gray-700">
                                        Judul <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="judul" wire:model="judul"
                                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-merah focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-3"
                                        placeholder="Masukkan judul program kerja">
                                    @error('judul') <spa
                                           n class="text-red-500 text-sm mt-1 block bg-red-50 p-2 rounded-md">{{ $message }}</span
                                       > @enderror
                                </div>
                                <div class="space-y-2">
                                    <label for="tanggal" class="block text-sm font-medium text-gray-700">
                                        Tanggal <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <input type="date" id="tanggal" wire:model="tanggal"
                                            class="pl-10 w-full rounded-lg border-gray-300 shadow-sm focus:border-merah focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-3">
                                    </div>
                                    @error('tanggal') <spa
                                         n               class="text-red-500 text-sm mt-1 block bg-red-50 p-2 rounded-md">{{ $message }}</span
                                      >                      @enderror
                                </div>
                                <div class="space-y-2">
                                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                    <div class="relative">
                                        <select id="status" wire:model="status"
                                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-merah focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-3 pr-10">
                                            <option value="draft">Draft</option>
                                            <option value="published">Published</option>
                                        </select>
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    @error('status') <spa
                                         n                   class="text-red-500 text-sm mt-1 block bg-red-50 p-2 rounded-md">{{ $message }}</span
                                      >                          @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden transform transition hover:shadow-lg">
                <div class="border-b border-gray-100 bg-gray-50 px-6 py-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-merah mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-800">Deskripsi</h2>
                </div>
                <div class="p-6">
                    <div class="mb-8">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi Lengkap <span class="text-red-500">*</span>
                        </label>
                        <textarea id="deskripsi" wire:model="deskripsi" rows="6"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-merah focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            placeholder="Tulis deskripsi lengkap tentang program kerja ini..."></textarea>
                        @error('deskripsi') <spa
                             n       class="text-red-500 text-sm mt-2 block bg-red-50 p-2 rounded-md">{{ $message }}</span
                          >  @enderror
                    </div>

                    <div>
                        <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">
                            Ringkasan (Excerpt)
                            <span class="font-normal text-gray-500 ml-1">(Optional)</span>
                        </label>
                        <textarea id="excerpt" wire:model="excerpt" rows="3"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-merah focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            placeholder="Biarkan kosong untuk generate otomatis dari deskripsi"></textarea>
                        <p class="text-sm text-gray-500 mt-2 flex items-center bg-blue-50 p-3 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-merah" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                            Biarkan kosong untuk generate otomatis dari deskripsi
                        </p>
                        @error('excerpt') <spa
                             n       class="text-red-500 text-sm mt-2 block bg-red-50 p-2 rounded-md">{{ $message }}</span
                          >  @enderror
                    </div>
                </div>
            </div>
            <div
                class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden transform transition hover:shadow-lg">
                <div class="border-b border-gray-100 bg-gray-50 px-6 py-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-merah mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-800">Tags</h2>
                </div>
                <div class="p-6">
                    <div>
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach($tags as $index => $tag)
                                <div
                                    class="bg-blue-50 text-merah px-4 py-2 rounded-full flex items-center group transition-all hover:bg-blue-100">
                                    <span class="font-medium"># {{ $tag }}</span>
                                    <button type="button" wire:click="removeTag({{ $index }})"
                                        class="ml-2 text-blue-400 group-hover:text-merah transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        <div class="flex">
                            <div class="relative flex-grow">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                    </svg>
                                </span>
                                <input type="text" wire:model="tagInput" wire:keydown.enter.prevent="addTag"
                                    placeholder="Add a tag"
                                    class="pl-10 flex-1 rounded-l-lg border-gray-300 shadow-sm focus:border-merah focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-3">
                            </div>
                            <button type="button" wire:click="addTag"
                                class="bg-merah hover:bg-red-600 text-white font-medium px-6 py-3 rounded-r-lg transition-colors">
                                Tambah
                            </button>
                        </div>

                        @error('tags.*') <spa
                              n  class="text-red-500 text-sm mt-2 block bg-red-50 p-2 rounded-md">{{ $message }}</span
                         >           @enderror
                    </div>
                </div>
            </div>
            <div
                class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden transform transition hover:shadow-lg">
                <div class="border-b border-gray-100 bg-gray-50 px-6 py-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-merah mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-800">Gambar Deskripsi</h2>
                </div>
                <div class="p-6">
                    <div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                            @foreach($gambardesk as $image)
                                <div class="relative group">
                                    <div class="h-40 rounded-lg overflow-hidden border-2 border-gray-200 shadow-sm">
                                        <img src="{{ Storage::url($image->path) }}" alt="Gambar Deskripsi"
                                            class="h-full w-full object-cover transition-all duration-300 group-hover:scale-105">
                                    </div>
                                    <button type="button" wire:click="removeGambardesk({{ $image->id }})"
                                        class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-8 h-8 flex items-center justify-center shadow-md hover:bg-red-600 transition-colors transform opacity-0 group-hover:opacity-100 group-hover:scale-100 scale-90 transition-all duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        <div class="flex items-center justify-center w-full mb-4">
                            <label
                                class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-all duration-300">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <div class="bg-blue-50 p-3 rounded-full mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-merah" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <p class="mb-2 text-sm font-medium text-gray-700">Klik untuk upload</p>
                                    <p class="mb-1 text-xs text-gray-500">atau drag and drop</p>
                                    <p class="text-xs text-gray-400">PNG, JPG, GIF (Max. 8MB)</p>
                                </div>
                                <input id="gambardeskFiles" wire:model="gambardeskFiles" type="file" multiple class="hidden" />
                            </label>
                        </div>

                        <div wire:loading wire:target="gambardeskFiles"
                            class="mb-4 text-sm text-merah flex items-center justify-center p-3 bg-red-50 rounded-md">
                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-merah" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            Mengupload gambar...
                        </div>

                        @if (session()->has('image_error'))
                            <div class="mb-4 text-sm text-red-500 bg-red-50 p-3 rounded-md">
                                {{ session('image_error') }}
                            </div>
                        @endif

                        <p class="text-sm text-gray-500 mt-2 flex items-center bg-blue-50 p-3 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-merah" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                            Max {{ $maxGambarDesk }} gambar. Ukuran max 8MB per gambar.
                        </p>

                        @error('gambardeskFiles.*') 
                            <span class="text-red-500 text-sm mt-2 block bg-red-50 p-2 rounded-md">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex justify-between items-center pt-6">
                <a href="{{ route('admin.indexproker') }}"
                    class="bg-white hover:bg-gray-100 text-gray-700 font-medium py-3 px-6 rounded-lg border border-gray-300 shadow-sm transition-colors flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Batalkan
                </a>
                <button type="submit"
                    class="bg-merah hover:bg-red-600 text-white font-medium py-3 px-8 rounded-lg shadow-md transition-colors flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>