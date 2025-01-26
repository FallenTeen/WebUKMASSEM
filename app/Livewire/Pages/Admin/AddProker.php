<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Proker;
use App\Models\MainProker;
use App\Models\GambardeskCache;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AddProker extends Component
{
    use WithFileUploads;
    public $step = 1;
    public $judul, $main_proker_id, $gambar, $tanggal, $kategori, $allMainProkers, $tagInput;
    public $deskripsi, $gambardesk = [], $tags = [], $gambardeskFiles = [];
    public $tempId;

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

    public function mount()
    {
        $this->allMainProkers = MainProker::all();
        $this->gambardesk = GambarDeskCache::where('user_id', Auth::id())->get();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function nextStep()
    {
        $rules = $this->rulesForStep();
        $this->validate($rules);
        $this->step++;
    }

    public function prevStep()
    {
        $this->step--;
    }

    public function rulesForStep()
    {
        return match ($this->step) {
            1 => [
                'main_proker_id' => 'required|exists:tb_main_proker,id',
                'judul' => 'required|string|max:64',
                'gambar' => 'nullable|image|max:8192',
                'tanggal' => 'nullable|date',
                'kategori' => 'required|in:primer,sekunder',
            ],
            2 => [
                'deskripsi' => 'nullable|string',
                'tags.*' => 'nullable|string|max:50',
            ],
            default => [],
        };
    }
    public function addTag()
    {
        if (!empty($this->tagInput) && !in_array($this->tagInput, $this->tags)) {
            $this->tags[] = $this->tagInput;
            $this->tagInput = '';
        }
    }

    public function removeTag($index)
    {
        unset($this->tags[$index]);
        $this->tags = array_values($this->tags);
    }

    public function removeGambardesk($imageId)
    {
        $image = GambarDeskCache::findOrFail($imageId);

        if ($image && $image->user_id == Auth::id()) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
            $this->gambardesk = GambarDeskCache::where('user_id', Auth::id())->get();
        }
    }
    public function updatedGambardeskFiles()
    {
        $this->validate([
            'gambardeskFiles.*' => 'image|max:8296',
        ]);

        foreach ($this->gambardeskFiles as $file) {
            $path = $file->store('proker/images', 'public');

            GambarDeskCache::create([
                'path' => $path,
                'type' => $file->getClientMimeType(),
                'temp_id' => uniqid(),
                'user_id' => Auth::id(),
            ]);
        }
        $this->gambardesk = GambarDeskCache::where('user_id', Auth::id())->get();
        $this->gambardeskFiles = [];
    }
    public function save()
    {
        $gambarPath = $this->gambar
            ? $this->gambar->store('proker/images', 'public')
            : null;

        $gambardeskPaths = [];
        foreach ($this->gambardesk as $image) {
            $gambardeskPaths[] = $image->path;
        }

        Proker::create([
            'main_proker_id' => $this->main_proker_id,
            'judul' => $this->judul,
            'gambar' => $gambarPath,
            'gambardesk' => json_encode($gambardeskPaths),
            'tanggal' => $this->tanggal,
            'deskripsi' => $this->deskripsi,
            'tags' => json_encode($this->tags),
            'kategori' => $this->kategori,
        ]);
        GambarDeskCache::where('user_id', Auth::id())->delete();

        sweetalert()->success('Proker Berhasil Ditambahkan');
        return redirect()->route('admin.indexproker');
    }

    public function render()
    {
        return view('livewire.pages.admin.add-proker')->layout('layouts.app');
    }
}
