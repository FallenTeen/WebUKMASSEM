<div>
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Proker</h4>
            </div>
            <div class="card-body">
                {{-- Step Navigation --}}
                <div class="mb-4">
                    <button type="button" class="btn btn-primary" @if($step == 1) disabled @endif wire:click="prevStep">Sebelumnya</button>
                    <button type="button" class="btn btn-primary" @if($step == 3) disabled @endif wire:click="nextStep">Selanjutnya</button>
                </div>

                {{-- Step 1 --}}
                @if ($step == 1)
                    <div>
                        <div class="mb-3">
                            <label for="main_proker_id" class="form-label">Judul Main Proker</label>
                            <select wire:model="main_proker_id" id="main_proker_id" class="form-select">
                                <option value="">Pilih Judul Main Proker</option>
                                @foreach ($allMainProkers as $mainProker)
                                    <option value="{{ $mainProker->id }}">{{ $mainProker->judul }}</option>
                                @endforeach
                            </select>
                            @error('main_proker_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select id="kategori" class="form-select" wire:model="kategori">
                                <option value="">Pilih Kategori</option>
                                <option value="primer">Primer</option>
                                <option value="sekunder">Sekunder</option>
                            </select>
                            @error('kategori') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Proker</label>
                            <input type="text" id="judul" class="form-control" wire:model="judul">
                            @error('judul') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" id="gambar" class="form-control" wire:model="gambar">
                            @error('gambar') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" id="tanggal" class="form-control" wire:model="tanggal">
                            @error('tanggal') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                @endif

                {{-- Step 2 --}}
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
                {{-- Step 3 --}}
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
                            <strong>Deskripsi:</strong> <p>{{ $deskripsi }}</p>
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

            </div>

            <div class="card-footer text-end">
                @if ($step == 3)
                    <button type="submit" class="btn btn-success">Simpan</button>
                @endif
            </div>
        </div>
    </form>
</div>
