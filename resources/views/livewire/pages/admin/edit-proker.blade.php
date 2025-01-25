<div class="p-6 rounded-lg shadow-lg space-y-8">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Proker') }}
        </h2>
    </x-slot>
    <!-- Section 1: Judul, Gambar, Tanggal, Main Proker -->
    <div class="section space-y-6 mx-4 mb-4 p-6 rounded-lg bg-white">
        <h3 class="text-xl font-semibold text-gray-700">Section 1: Judul, Gambar, Tanggal, Main Proker, Kategori</h3>
        <form wire:submit.prevent="saveSection1" class="space-y-4">
            <div class="flex flex-row">
                <div class="w-1/2">
                    <div class="form-group">
                        <div class="mt-2 flex justify-center">
                            <label for="gambar" class="cursor-pointer">
                                @if($gambar && $gambar instanceof \Illuminate\Http\UploadedFile)
                                <img src="{{ $gambar->temporaryUrl() }}" alt="Preview" class="rounded-lg shadow-md max-w-full h-auto" style="max-width: 400px;">
                                @elseif($proker->gambar)
                                <img src="{{ Storage::url($proker->gambar) }}" alt="Current Image" class="rounded-lg shadow-md max-w-full h-auto" style="max-width: 400px;">
                                @else
                                <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-400">
                                    <span>Click to upload image</span>
                                </div>
                                @endif
                            </label>
                        </div>
                        <input type="file" id="gambar" class="mt-2 hidden" wire:model="gambar">

                        @error('gambar')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="w-2/3 flex flex-col gap-2 justify-center">
                    <div class="flex items-center mb-6">
                        <div class="grid">
                            <span class="font-bold text-2xl">Masukkan Data Utama</span>
                            <span class="texst-sm">Data-data seperti nama proker, tanggal dan sebagainya</span>
                        </div>
                    </div>
                    <div class="flex gap-4 w-full">
                        <div class="w-1/2 form-group flex flex-col justify-center">
                            <label for="judul" class=" block text-gray-600">Judul</label>
                            <input type="text" id="judul" class="form-control block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-merah"
                                wire:model="judul" placeholder="Masukkan Judul Proker">
                            @error('judul') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-1/2 form-group">
                            <label for="tanggal" class="block text-gray-600">Tanggal</label>
                            <input type="date" id="tanggal" class=" block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-merah"
                                wire:model="tanggal">
                            @error('tanggal') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex w-full gap-4">
                        <div class="form-group w-1/2">
                            <label for="main_proker_id" class="block text-gray-600">Proker Utama</label>
                            <select id="main_proker_id" class="form-control block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-merah"
                                wire:model="main_proker_id">
                                <option value="">Pilih Proker Utama</option>
                                @foreach($allMainProkers as $mainProker)
                                <option value="{{ $mainProker->id }}">{{ $mainProker->judul }}</option>
                                @endforeach
                            </select>
                            @error('main_proker_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group w-1/2">
                            <label for="kategori" class="block text-gray-600">Kategori</label>
                            <select id="kategori" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                wire:model="kategori">
                                <option value="primer">Primer</option>
                                <option value="sekunder">Sekunder</option>
                            </select>
                            @error('kategori') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>


            </div>
            <button type="submit" class="w-full btn btn-primary mt-4 px-6 py-3 bg-merah text-white rounded-lg hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500">Simpan data utama</button>
        </form>
    </div>

    <!-- Section 2: Deskripsi, Gambardesk, Tags, Kategori -->
    <div class="section space-y-6 mx-4 mb-4 p-6 bg-white rounded-lg">
        <h3 class="text-xl font-semibold text-gray-700">Section 2: Deskripsi, Gambardesk, Tags</h3>
        <form wire:submit.prevent="saveSection2" class="space-y-4">
            <div class="form-group">
                <label for="deskripsi" class="block text-gray-600">Deskripsi</label>
                <trix-editor input="deskripsi" wire:model="deskripsi"></trix-editor>
                @error('deskripsi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="gambardesk" class="block text-gray-600">Gambar deskripsi/dokumentasi</label>
                <input type="file" id="gambardesk" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    wire:model="gambardesk" multiple>

                @if(!empty($existingGambarDesk))
                <div class="mt-3 space-y-2 flex gap-4">
                    @foreach($existingGambarDesk as $index => $image)
                    <div class="relative flex items-center space-x-2">
                        <img src="{{ Storage::url($image) }}" alt="Existing Gambardesk" class="rounded shadow-md" width="100">
                        <button type="button" class="absolute top-1 right-1 text-white bg-red-600 rounded-full w-5 h-5 flex items-center justify-center text-lg font-bold"
                            wire:click="removeGambardesk({{ $index }})">
                            &times;
                        </button>
                    </div>
                    @endforeach
                </div>

                @endif

                @if($gambardesk && is_array($gambardesk))
                <div class="mt-3 space-y-2 flex">
                    @foreach($gambardesk as $image)
                    @if(is_object($image))
                    <img src="{{ $image->temporaryUrl() }}" alt="Gambardesk Preview" class="rounded shadow-md" width="100">
                    @elseif(is_string($image))
                    <img src="{{ Storage::url($image) }}" alt="Existing Gambardesk" class="rounded shadow-md" width="100">
                    @endif
                    @endforeach
                </div>
                @endif
                @error('gambardesk.*') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="tags" class="form-label">Tags</label>
                <div class="mt-2">
                    <div class="flex items-center gap-4">
                        <input
                            type="text"
                            wire:model="tagInput"
                            class="form-control active:outline-none focus:ring-2 focus:ring-merah focus:border-merah"
                            placeholder="Add a tag"
                            wire:keydown.enter="addTag">
                        <button type="button" wire:click="addTag"
                            class="group cursor-pointer outline-none hover:rotate-90 duration-300">
                            <svg
                                class="stroke-merah fill-none group-hover:fill-red-200 group-active:stroke-red-200 group-active:fill-red-600 group-active:duration-0 duration-300"
                                viewBox="0 0 24 24"
                                height="45px"
                                width="45px"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    stroke-width="1.5"
                                    d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z"></path>
                                <path stroke-width="1.5" d="M8 12H16"></path>
                                <path stroke-width="1.5" d="M12 16V8"></path>
                            </svg>
                        </button>
                    </div>


                    <div class="mt-2">
                        @foreach ($tags as $index => $tag)
                        <span class="inline-flex items-center bg-gray-200 text-gray-800 rounded-full px-4 py-2 mb-2 mr-2">
                            <div class="text-sm font-semibold">
                                {{ $tag }}
                            </div>
                            <button
                                type="button"
                                class="ml-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-700 focus:outline-none"
                                wire:click="removeTag({{ $index }})">
                                <span class="text-sm">&times;</span>
                            </button>
                        </span>

                        @endforeach
                    </div>
                </div>
            </div>



            <button type="submit" class=" w-full btn btn-primary mt-4 px-6 py-3 bg-merah text-white rounded-lg hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-merah">Simpan Deskripsi</button>
        </form>
    </div>

</div>