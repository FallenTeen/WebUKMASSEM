<div>
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        @csrf

        <div class="card">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Tambahkan proker') }}
                </h2>
            </x-slot>


            <div class="card-body bg-white my-6 mx-8 rounded-lg">
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
                            <div class="px-2 flex-col flex {{ $step >= 2 ? 'text-blue-500' : ' text-gray-900' }}">
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
                            <div class="px-2 flex-col flex {{ $step >= 2 ? 'text-merah' : ' text-gray-900' }}">
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

                <!-- Step 1 -->
                @if ($step == 1)
                <div class="w-full flex flex-row gap-4 px-32">
                    <div class="w-1/3 ">
                        @if (!$gambar)

                        <div class="w-full h-full flex justify-center items-center relative border-2 border-gray-300 border-dashed rounded-lg p-6" id="dropzone">
                            <input type="file" class="absolute inset-0 w-full h-full opacity-0 z-50" wire:model="gambar" id="file-upload" />

                            <div class="text-center items-center">
                                <img class="mx-auto h-12 w-12" src="https://www.svgrepo.com/show/357902/image-upload.svg" alt="">

                                <h3 class="mt-2 text-sm font-medium text-gray-900">
                                    <label for="file-upload" class="relative cursor-pointer">
                                        <span>Tarik gambar</span>
                                        <span class="text-indigo-600"> atau telusuri</span>
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
                        <img src="{{ $gambar->temporaryUrl() }}" class="mt-4 max-h-40" id="preview">
                        @else
                        <img src="" class="mt-4 max-h-40 hidden" id="preview">
                        @endif
                    </div>
                    <div class="flex flex-col w-2/3 gap-4">
                        <div class="flex w-full">
                            <label for="main_proker_id" class="form-label w-1/3">Kategori Proker</label>
                            <select wire:model="main_proker_id" id="kategori" class="w-2/3 form-select py-2 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-merah focus:border-merah text-gray-900">
                                <option value="">Pilih Kategori Proker</option>
                                @foreach ($allMainProkers as $mainProker)
                                <option value="{{ $mainProker->id }}">{{ $mainProker->judul }}</option>
                                @endforeach
                            </select>
                            @error('main_proker_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex w-full justify-between">
                            <label for="kategori" class="w-1/3 form-label">Kategori</label>
                            <select wire:model="kategori" id="kategori" class="w-2/3 form-select py-2 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-merah focus:border-merah text-gray-900">
                                <option value="">Pilih Kategori</option>
                                <option value="primer">Primer</option>
                                <option value="sekunder">Sekunder</option>
                            </select>
                            @error('kategori') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex w-full justify-between">
                            <label for="judul" class="form-label">Judul Proker</label>
                            <input type="text" id="judul" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="judul">
                            @error('judul') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex w-full justify-between">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input onclick="this.showPicker()" type="date" id="tanggal" class="form-control p-3 rounded-full border-2 border-transparent focus:outline-none focus:border-red-500 bg-white/20 backdrop-blur-lg shadow-md" wire:model="tanggal">
                            @error('tanggal') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @endif

                <!-- Step 2 -->
                @if ($step == 2)
                <div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea id="deskripsi" class="form-control" wire:model="deskripsi"></textarea>
                        @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="gambardesk" class="form-label">Gambar Deskripsi</label>
                        <input type="file" id="gambardesk" class="form-control" wire:model="gambardesk" multiple>
                        @error('gambardesk.*') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags</label>
                        <div class="d-flex">
                            <input type="text" id="tagInput" class="form-control me-2" placeholder="Tambah Tag" wire:model.defer="tagInput">
                            <button type="button" class="btn btn-primary" wire:click="addTag">Tambah</button>
                        </div>
                        <div class="mt-2">
                            @foreach ($tags as $index => $tag)
                            <span class="badge bg-secondary me-2">
                                {{ $tag }}
                                <button type="button" class="btn-close btn-close-white" aria-label="Remove" wire:click="removeTag({{ $index }})"></button>
                            </span>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                <!-- Step 3 -->
                @if ($step == 3)
                <div>
                    <h5>Preview Data</h5>
                    <div class="mb-3">
                        <strong>Judul Main Proker:</strong> {{ $allMainProkers->firstWhere('id', $main_proker_id)->judul ?? 'Not selected' }}
                    </div>
                    <div class="mb-3">
                        <strong>Kategori:</strong> {{ ucfirst($kategori) }}
                    </div>
                    <div class="mb-3">
                        <strong>Judul Proker:</strong> {{ $judul }}
                    </div>
                    <div class="mb-3">
                        <strong>Gambar:</strong>
                        @if($gambar)
                        <img src="{{ $gambar->temporaryUrl() }}" class="img-thumbnail" width="100">
                        @else
                        Not selected
                        @endif
                    </div>
                    <div class="mb-3">
                        <strong>Tanggal:</strong> {{ $tanggal }}
                    </div>
                    <div class="mb-3">
                        <strong>Deskripsi:</strong>
                        <p>{{ $deskripsi }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Gambar Deskripsi:</strong>
                        <div class="row">
                            @foreach ($gambardesk as $image)
                            <div class="col-3">
                                <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail" width="100">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3">
                        <strong>Tags:</strong>
                        <div>
                            @foreach ($tags as $tag)
                            <span class="badge bg-secondary">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                <div class="mb-4">
                    <button type="button" class="btn btn-primary {{ $step > 1 ? 'block' : 'hidden' }} text-gray-900" wire:click="prevStep">Sebelumnya</button>

                    @if ($step >= 1 && $step < 3)
                        <button type="button" class="btn btn-primary {{ $step >= 1 && $step < 3 ? 'block' : 'hidden' }}" wire:click="nextStep">Selanjutnya</button>
                        @elseif ($step == 3)
                        <button type="submit" class="btn btn-success">Simpan</button>
                        @endif
                </div>

                <div class="card-footer text-end">
                    @if ($step == 3)
                    <button type="submit" class="btn btn-success">Simpan</button>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>