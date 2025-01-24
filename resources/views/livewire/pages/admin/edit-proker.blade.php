<div>
    <!-- Section 1: Judul, Gambar, Tanggal, Main Proker -->
    <div class="section" style="margin-bottom: 30px;">
        <h3>Section 1: Judul, Gambar, Tanggal, Main Proker</h3>
        <form wire:submit.prevent="saveSection1">
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" id="judul" class="form-control" wire:model="judul"
                    placeholder="Masukkan Judul Proker">
                @error('judul') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="main_proker_id">Main Proker</label>
                <select id="main_proker_id" class="form-control" wire:model="main_proker_id">
                    <option value="">Pilih Main Proker</option>
                    @foreach($allMainProkers as $mainProker)
                        <option value="{{ $mainProker->id }}">{{ $mainProker->judul }}</option>
                    @endforeach
                </select>
                @error('main_proker_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" id="gambar" class="form-control" wire:model="gambar">
                @if($gambar && $gambar instanceof \Illuminate\Http\UploadedFile)
                    <img src="{{ $gambar->temporaryUrl() }}" alt="Preview" width="100" class="mt-2">
                @elseif($proker->gambar)
                    <img src="{{ Storage::url($proker->gambar) }}" alt="Current Image" width="100" class="mt-2">
                @endif

                @error('gambar') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" class="form-control" wire:model="tanggal">
                @error('tanggal') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Save Section 1</button>
        </form>
    </div>

    <div class="section">
        <h3>Section 2: Deskripsi, Gambardesk, Tags, Kategori</h3>
        <form wire:submit.prevent="saveSection2">
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" class="form-control" wire:model="deskripsi" rows="4"
                    placeholder="Masukkan Deskripsi Proker"></textarea>
                @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="gambardesk">Gambardesk</label>
                <input type="file" id="gambardesk" class="form-control" wire:model="gambardesk" multiple>

                @if(!empty($existingGambarDesk))
                    <div class="mt-2">
                        @foreach($existingGambarDesk as $index => $image)
                            <div class="image-item">
                                <img src="{{ Storage::url($image) }}" alt="Existing Gambardesk" width="100">
                                <button type="button" class="btn btn-danger btn-sm"
                                    wire:click="removeGambardesk({{ $index }})">Delete</button>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if($gambardesk && is_array($gambardesk))
                    <div class="mt-2">
                        @foreach($gambardesk as $image)
                            @if(is_object($image))
                                <img src="{{ $image->temporaryUrl() }}" alt="Gambardesk Preview" width="100">
                            @elseif(is_string($image))
                                <img src="{{ Storage::url($image) }}" alt="Existing Gambardesk" width="100">
                            @endif
                        @endforeach
                    </div>
                @endif

                @error('gambardesk.*') <span class="text-danger">{{ $message }}</span> @enderror
            </div>


            <div class="form-group">
                <label for="tags">Tags</label>
                <input type="text" id="tags" class="form-control" wire:model="tagInput" placeholder="Tambah Tag">
                <button type="button" class="btn btn-info mt-2" wire:click="addTag">Add Tag</button>
                <ul class="mt-2">
                    @foreach($tags as $index => $tag)
                        <li>
                            {{ $tag }}
                            <button type="button" class="btn btn-danger btn-sm"
                                wire:click="removeTag({{ $index }})">Remove</button>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select id="kategori" class="form-control" wire:model="kategori">
                    <option value="primer">Primer</option>
                    <option value="sekunder">Sekunder</option>
                </select>
                @error('kategori') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Save Section 2</button>
        </form>
    </div>
</div>