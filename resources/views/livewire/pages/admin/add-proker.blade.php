<div>
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        @csrf

        <div class="card">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Tambahkan proker') }}
                </h2>
            </x-slot>

            <div class="card-body flex flex-col bg-white my-6 rounded-lg px-8">
                <ol class="py-4 items-center flex justify-between w-3/5 mx-auto space-y-4 sm:flex sm:space-x-8 sm:space-y-0 rtl:space-x-reverse">
                    <div class="flex items-center space-x-4">
                        <!-- Step 1 -->
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center {{ $step >= 1 ? 'bg-merah text-white' : 'bg-gray-300 text-gray-700' }}">
                                1
                            </div>
                            <div class="px-2 flex-col flex {{ $step >= 1 ? 'text-merah' : ' text-gray-900' }}">
                                <span class="font-bold">
                                    Step 1
                                </span>
                                <span>
                                    Masukkan Data Utama Proker
                                </span>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center {{ $step >= 2 ? 'bg-merah text-white' : 'bg-gray-300 text-gray-700' }}">
                                2
                            </div>
                            <div class="px-2 flex-col flex {{ $step >= 2 ? 'text-merah' : ' text-gray-900' }}">
                                <span class="font-bold">
                                    Step 2
                                </span>
                                <span>
                                    Masukkan Data Lengkap Proker
                                </span>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center {{ $step >= 3 ? 'bg-merah text-white' : 'bg-gray-300 text-gray-700' }}">
                                3
                            </div>
                            <div class="px-2 flex-col flex {{ $step >= 3 ? 'text-merah' : ' text-gray-900' }}">
                                <span class="font-bold">
                                    Step 3
                                </span>
                                <span>
                                    Konfirmasi Data Proker
                                </span>
                            </div>
                        </div>
                    </div>
                </ol>
                <div class="w-full h-grow flex gap-8">
                    <!-- step 1 -->
                    @if ($step == 1)
                    <div class="w-1/3 h-grow">
                        @if (!$gambar)
                        <div class="w-full h-full flex justify-center items-center relative border-2 border-gray-300 border-dashed rounded-lg p-6" id="dropzone">
                            <input type="file" class="absolute inset-0 w-full h-full opacity-0 z-50" wire:model="gambar" id="file-upload" />
                            <div class="text-center items-center">
                                <img class="mx-auto h-12 w-12" src="https://www.svgrepo.com/show/357902/image-upload.svg" alt="">
                                <h3 class="mt-2 text-sm font-medium text-gray-900">
                                    <label for="file-upload" class="relative cursor-pointer">
                                        <span>Tarik gambar</span>
                                        <span class="text-merah"> atau telusuri</span>
                                        <span>untuk upload</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only" wire:model="gambar">
                                    </label>
                                </h3>
                                <p class="mt-1 text-xs text-gray-500">
                                    PNG, JPG up to 8MB
                                </p>
                            </div>
                        </div>
                        @endif

                        @if ($gambar)
                        <div class="relative">
                            <img src="{{ $gambar->temporaryUrl() }}" class="mt-4 min-w-full object-cover cursor-pointer" id="preview" onclick="document.getElementById('file-upload').click()">

                            <input type="file" wire:model="gambar" id="file-upload" class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer">
                            <div class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50 cursor-pointer opacity-0 hover:opacity-100 duration-300 ease-in-out">
                                <span class="text-white text-lg">Klik untuk ganti gambar</span>
                            </div>
                        </div>


                        @else
                        <img src="" class="mt-4 max-h-40 hidden" id="preview">
                        @endif
                    </div>


                    <div class="flex flex-col w-2/3 gap-4 h-grow justify-between">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center {{ $step >= 1 ? 'bg-merah text-white' : 'bg-gray-300 text-gray-700' }}">
                                1
                            </div>
                            <div class="grid">
                                <span class="px-4 font-bold text-2xl">Masukkan Data Utama</span>
                                <span class="px-4 texst-sm">Data-data seperti nama proker, tanggal dan sebagainya</span>
                            </div>
                        </div>

                        <div class="flex w-full items-center">
                            <label for="main_proker_id" class="form-label w-1/3">Kategori Proker</label>
                            <div class="w-2/3 flex flex-col">
                                <select wire:model="main_proker_id" id="kategori" class="w-full form-select py-2 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-merah focus:border-merah text-gray-900">
                                    <option value="">Pilih Kategori Proker</option>
                                    @foreach ($allMainProkers as $mainProker)
                                    <option value="{{ $mainProker->id }}">{{ $mainProker->judul }}</option>
                                    @endforeach
                                </select>
                                <span class="text-xs font-light italic {{ $errors->has('main_proker_id') ? 'text-red-500' : 'text-gray-700' }}">
                                    {{ $errors->has('main_proker_id') ? $errors->first('main_proker_id') : 'Kategori berupa apa induk dari program ini' }}
                                </span>
                            </div>
                        </div>

                        <div class="flex w-full justify-between items-center">
                            <label for="kategori" class="w-1/3 form-label">Kategori</label>
                            <div class="w-2/3 flex flex-col">
                                <select wire:model="kategori" id="kategori" class="w-full form-select py-2 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-merah focus:border-merah text-gray-900">
                                    <option value="">Pilih Kategori</option>
                                    <option value="primer">Primer</option>
                                    <option value="sekunder">Sekunder</option>
                                </select>
                                <span class="text-xs font-light italic {{ $errors->has('kategori') ? 'text-red-500' : 'text-gray-700' }}">
                                    {{ $errors->has('kategori') ? $errors->first('kategori') : 'Pilih kategori utama untuk program ini' }}
                                </span>
                            </div>
                        </div>

                        <div class="flex w-full justify-between items-center">
                            <label for="judul" class="form-label w-1/3">Judul Proker</label>
                            <div class="w-2/3 flex flex-col">
                                <input type="text" id="judul" class="form-control w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-merah focus:border-merah block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:merah dark:focus:merah" wire:model="judul">
                                <span class="text-xs font-light italic {{ $errors->has('judul') ? 'text-red-500' : 'text-gray-700' }}">
                                    {{ $errors->has('judul') ? $errors->first('judul') : 'Masukkan judul program kerja' }}
                                </span>
                            </div>
                        </div>

                        <div class="flex w-full justify-between items-center">
                            <label for="tanggal" class="form-label w-1/3">Tanggal</label>
                            <div class="w-2/3 flex flex-col">
                                <input onclick="this.showPicker()" type="date" id="tanggal" class="w-full rounded-lg form-control py-2 border-2 border-gray-300 focus:outline-none focus:border-red-500 bg-white/20 backdrop-blur-lg" wire:model="tanggal">
                                <span class="text-xs font-light italic {{ $errors->has('judul') ? 'text-red-500' : 'text-gray-700' }}">
                                    {{ $errors->has('judul') ? $errors->first('judul') : 'Masukkan Tanggal Kegiatan' }}
                                </span>

                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- step2 -->
                    @if ($step == 2)
                    <div class="w-full">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center {{ $step >= 2 ? 'bg-merah text-white' : 'bg-gray-300 text-gray-700' }}">
                                2
                            </div>
                            <div class="grid">
                                <span class="px-4 font-bold text-2xl">Masukkan Deskripsi Kegiatan</span>
                                <span class="px-4 text-sm">Data-data seperti deskripsi kegiatan, Dokumentasi dan sebagainya</span>
                            </div>
                        </div>

                        <div class="w-full flex flex-col">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input id="deskripsi" type="hidden" wire:ignore wire:model="deskripsi">
                            <trix-editor input="deskripsi" wire:ignore></trix-editor>
                            @error('deskripsi')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div>
                            <h3>Gambar Deskripsi/Dokumentasi</h3>
                            <div class="mb-4 flex flex-wrap relative">
                                <div class="pr-4 flex flex-wrap" id="gambar-desk-container">
                                    @foreach($gambardesk as $image)
                                    <div class="flex items-center mb-2 relative">
                                        <a href="{{ Storage::url($image->path) }}" target="_blank">
                                            <img src="{{ Storage::url($image->path) }}" alt="Gambar Desk" class="w-24 h-24 object-cover rounded-md mr-2" />
                                        </a>
                                        <button
                                            type="button"
                                            wire:click="removeGambardesk({{ $image->id }})"
                                            class="absolute -top-1 right-0 bg-red-500 text-white text-xs rounded-full p-1 hover:bg-red-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                            </svg>

                                        </button>
                                    </div>
                                    @endforeach


                                    @foreach($gambardeskFiles as $file)
                                    <div class="flex items-center mb-2">
                                        <img src="{{ $file->temporaryUrl() }}" alt="Gambar Desk" class="w-24 h-24 object-cover rounded-md mr-2" />
                                    </div>
                                    @endforeach
                                </div>

                                <div class="file-upload flex items-center justify-center h-auto">
                                    <input type="file" wire:model="gambardeskFiles" multiple id="file-upload" class="hidden file-upload-input" />
                                    <div>
                                        <label for="file-upload" class="cursor-pointer file-upload-label p-2 text-center justify-center flex flex-col items-center border-2 border-dashed border-blue-500 rounded-xl hover:bg-blue-50 transition duration-300 ease-in-out">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-blue-500 mb-2 transition duration-300 ease-in-out">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <!-- Text below the icon -->
                                            <span class="text-blue-500 font-semibold text-sm">Tambah Gambar</span>
                                        </label>
                                    </div>
                                </div>


                                @error('gambardeskFiles.*')
                                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            @if (session()->has('message'))
                            <div class="mt-2 text-green-500">
                                {{ session('message') }}
                            </div>
                            @endif
                        </div>


                        <div class="mb-3">
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
                    </div>
                    @endif
                    <!-- step3 -->
                    @if ($step == 3)
                    <div class="w-full">


                        <div class="flex flex-row mx-14 mt-10">
                            <div class="w-1/3 flex-col flex gap-4">
                                <div>
                                    <div class="relative">
                                        @if ($gambar)
                                        <img src="{{ $gambar->temporaryUrl() }}" class="mt-4 min-w-full object-cover cursor-pointer" id="preview" onclick="document.getElementById('file-upload').click()">
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <div class="pr-4 flex flex-wrap" id="gambar-desk-container">
                                        @foreach($gambardesk as $image)
                                        <div class="flex items-center mb-2 relative">
                                            <a href="{{ Storage::url($image->path) }}" target="_blank">
                                                <img src="{{ Storage::url($image->path) }}" alt="Gambar Desk" class="w-24 h-24 object-cover rounded-md mr-2" />
                                            </a>
                                            <button
                                                type="button"
                                                wire:click="removeGambardesk({{ $image->id }})"
                                                class="absolute -top-1 right-0 bg-red-500 text-white text-xs rounded-full p-1 hover:bg-red-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                </svg>

                                            </button>
                                        </div>
                                        @endforeach


                                        @foreach($gambardeskFiles as $file)
                                        <div class="flex items-center mb-2">
                                            <img src="{{ $file->temporaryUrl() }}" alt="Gambar Desk" class="w-24 h-24 object-cover rounded-md mr-2" />
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class=" pl-12 w-2/3 flex flex-col gap-4">
                                <div class="flex items-center mb-4">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center {{ $step >= 2 ? 'bg-merah text-white' : 'bg-gray-300 text-gray-700' }}">
                                        3
                                    </div>
                                    <div class="grid">
                                        <span class="px-4 font-bold text-2xl">Preview</span>
                                        <span class="px-4 text-sm">Pastikan data-datanya sudah benar</span>
                                    </div>
                                </div>
                                <div class="flex w-full">
                                    <strong class="w-1/3">Judul Main Proker</strong>
                                    <div class="w-2/3">{{ $allMainProkers->firstWhere('id', $main_proker_id)->judul ?? 'Not selected' }}</div>
                                </div>
                                <div class="flex w-full">
                                    <strong class="w-1/3">Kategori</strong>
                                    <div class="w-2/3">{{ ucfirst($kategori) }}</div>
                                </div>
                                <div class="flex w-full">
                                    <strong class="w-1/3">Judul Proker</strong>
                                    <div class="w-2/3">{{ $judul }}</div>
                                </div>

                                <div class="flex w-full">
                                    <strong class="w-1/3">Tanggal</strong>
                                    <div class="w-2/3">{{ $tanggal }}</div>
                                </div>
                                <div class="flex w-full">
                                    <strong class="w-1/3">Deskripsi</strong>
                                    <p class="w-2/3">{{ $deskripsi }}</p>
                                </div>

                                <div class="mb-3">
                                    <strong>Tags</strong>
                                    <div>
                                        @foreach ($tags as $tag)
                                        <span class="badge bg-secondary">{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="w-full flex justify-center gap-8 my-6">
                            <button type="button" class="{{ $step > 1 && $step <= 3 ? 'grow bg-gray-500 block rounded-lg px-3 py-2' : 'hidden' }} text-white" wire:click="prevStep">Sebelumnya</button>
                            @if ($step >= 1 && $step < 3)
                                <button type="button" class="{{ $step >= 1 && $step < 3 ? 'block rounded-lg px-3 py-2 bg-merah text-white grow' : 'hidden' }}" wire:click="nextStep">Selanjutnya</button>
                                @elseif ($step == 3)
                                <button type="submit" class="block rounded-lg px-3 py-2 bg-merah text-white grow">Simpan</button>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>