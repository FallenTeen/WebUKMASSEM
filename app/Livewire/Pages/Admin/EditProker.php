<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use App\Models\Proker;
use App\Models\MainProker;
use Livewire\WithFileUploads;

class EditProker extends Component
{
    use WithFileUploads;

    public $proker;
    public $judul, $main_proker_id, $gambar, $tanggal, $kategori;
    public $existingGambar, $existingGambarDesk = [];
    public $maxGambarDesk = 5;
    public $deskripsi, $gambardesk = [], $tags = [];
    public $tagInput, $allMainProkers = [];

    protected $rules = [
        'main_proker_id' => 'required|exists:tb_main_proker,id',
        'judul' => 'required|string|max:64',
        'gambar' => 'nullable|image|max:8192',
        'tanggal' => 'nullable|date',
        'deskripsi' => 'nullable|string',
        'gambardesk.*' => 'nullable|image|max:8192',
        'tags.*' => 'nullable|string|max:50',
        'kategori' => 'required|in:primer,sekunder'
    ];

    public function mount($id)
    {
        $this->proker = Proker::find($id);

        if ($this->proker) {
            $this->judul = $this->proker->judul;
            $this->main_proker_id = $this->proker->main_proker_id;
            $this->gambar = $this->proker->gambar;
            $this->existingGambar = $this->proker->gambar;
            $this->tanggal = $this->proker->tanggal;
            $this->deskripsi = $this->proker->deskripsi;
            $this->tags = json_decode($this->proker->tags, true) ?? [];
            $this->kategori = $this->proker->kategori;
            $this->existingGambarDesk = json_decode($this->proker->gambardesk, true) ?? [];
        }

        $this->allMainProkers = MainProker::all();
    }

    public function saveImage()
    {
        if ($this->gambar instanceof \Illuminate\Http\UploadedFile) {
            $this->validate([
                'gambar' => 'image|max:8192',
            ]);
            if ($this->existingGambar && file_exists(storage_path('app/public/' . $this->existingGambar))) {
                unlink(storage_path('app/public/' . $this->existingGambar));
            }
            $gambarPath = $this->gambar->store('proker/images', 'public');
            $this->proker->gambar = $gambarPath;
        } else {
            $this->proker->gambar = $this->existingGambar;
        }
    }
    public function removeGambardesk($index)
    {
        $gambardeskImages = $this->existingGambarDesk;
        $imageToDelete = $gambardeskImages[$index];
        if (file_exists(storage_path('app/public/' . $imageToDelete))) {
            unlink(storage_path('app/public/' . $imageToDelete));
        }
        unset($gambardeskImages[$index]);
        $this->existingGambarDesk = array_values($gambardeskImages);
        $this->proker->gambardesk = json_encode($this->existingGambarDesk);
        $this->proker->save();
    }

    public function saveGambardesk()
    {
        $this->validate([
            'gambardesk.*' => 'nullable|image|max:8192',
        ]);
        if (!empty($this->gambardesk)) {
            $gambardeskPaths = collect($this->gambardesk)
                ->map(fn($file) => $file->store('proker/gambardesk', 'public'))
                ->toArray();
            $allImages = array_merge($this->existingGambarDesk, $gambardeskPaths);
        } else {
            $allImages = $this->existingGambarDesk;
        }
        $this->proker->gambardesk = json_encode($allImages);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveSection1()
    {
        $this->validate([
            'main_proker_id' => 'required|exists:tb_main_proker,id',
            'judul' => 'required|string|max:64',
            'tanggal' => 'nullable|date',
            'kategori' => 'required|in:primer,sekunder',
        ]);

        if ($this->gambar instanceof \Illuminate\Http\UploadedFile) {
            $this->validate([
                'gambar' => 'image|max:8192',
            ]);
        }
        $this->saveImage();
        $this->proker->update([
            'main_proker_id' => $this->main_proker_id,
            'judul' => $this->judul,
            'gambar' => $this->proker->gambar,
            'tanggal' => $this->tanggal,
            'kategori' => $this->kategori,
        ]);

        sweetalert()->success('Data Utama Berhasil Diubah');
    }

    public function saveSection2()
    {
        $this->validate([
            'deskripsi' => 'nullable|string',
            'gambardesk.*' => 'nullable|image|max:8192',
            'tags.*' => 'nullable|string|max:50',

        ]);

        $this->saveGambardesk();

        $this->proker->update([
            'deskripsi' => $this->deskripsi,
            'gambardesk' => $this->proker->gambardesk,
            'tags' => json_encode($this->tags),

        ]);

        sweetalert()->success('Deskripsi Berhasil Diubah');
    }

    public function addTag()
    {
        $sanitizedTag = trim($this->tagInput);
        if (!empty($sanitizedTag) && !in_array($sanitizedTag, $this->tags) && strlen($sanitizedTag) <= 50) {
            $this->tags[] = $sanitizedTag;
            $this->tagInput = '';
        }
    }

    public function removeTag($index)
    {
        array_splice($this->tags, $index, 1);
    }

    public function render()
    {
        return view('livewire.pages.admin.edit-proker', [
            'mainProkers' => $this->allMainProkers,
            'gambar' => $this->gambar,
        ])->layout('layouts.app');
    }
}
