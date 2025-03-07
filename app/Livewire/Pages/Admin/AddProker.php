<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Proker;
use App\Models\MainProker;
use App\Models\GambardeskCache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Carbon\Carbon;

class AddProker extends Component
{
    use WithFileUploads;
    const MAX_TAGS = 5, MAX_IMAGE_SIZE = 8192;
    public $confirmCheck;
    public $step = 1;

    #[Validate('required|exists:tb_main_proker,id')]
    public $main_proker_id;

    #[Validate('required|string|max:64')]
    public $judul;

    #[Validate('nullable|image|max:8192')]
    public $gambar;

    #[Validate('nullable|date')]
    public $tanggal;

    #[Validate('required|in:primer,sekunder')]
    public $kategori = 'sekunder';

    #[Validate('nullable|string')]
    public $deskripsi;

    public $tagInput = '';
    public $tempId;
    public $tags = [];
    public $gambardesk = [];
    public $gambardeskFiles = [];
    public $allMainProkers;
    public function mount()
    {
        $this->allMainProkers = MainProker::all();
        $this->gambardesk = GambardeskCache::where('user_id', Auth::id())->get();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function nextStep()
    {
        $rules = $this->rulesForStep();
        $this->validate($rules);
        if ($this->step < 3) {
            $this->step++;
        }
    }

    public function prevStep()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function rulesForStep()
    {
        return match ($this->step) {
            1 => [
                'main_proker_id' => 'required|exists:tb_main_proker,id',
                'judul' => 'required|string|max:64',
                'gambar' => 'nullable|image|max:' . self::MAX_IMAGE_SIZE,
                'tanggal' => 'nullable|date',
                'kategori' => 'required|in:primer,sekunder',
            ],
            2 => [
                'deskripsi' => 'nullable|string',
                'tags' => 'array|max:' . self::MAX_TAGS,
                'tags.*' => 'nullable|string|max:50',
            ],
            default => [],
        };
    }

    public function addTag()
    {
        if (empty(trim($this->tagInput))) {
            return;
        }

        $this->validate([
            'tagInput' => 'required|string|max:50',
        ]);

        if (count($this->tags) >= self::MAX_TAGS) {
            session()->flash('tag_error', 'Maximum ' . self::MAX_TAGS . ' tags allowed');
            return;
        }

        if (!in_array($this->tagInput, $this->tags)) {
            $this->tags[] = trim($this->tagInput);
        }

        $this->tagInput = '';
    }

    public function removeTag($index)
    {
        if (isset($this->tags[$index])) {
            unset($this->tags[$index]);
            $this->tags = array_values($this->tags);
        }
    }

    public function removeGambardesk($imageId)
    {
        $image = GambardeskCache::findOrFail($imageId);

        if ($image && $image->user_id == Auth::id()) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
            $this->gambardesk = GambardeskCache::where('user_id', Auth::id())->get();
        }
    }

    public function updatedGambardeskFiles()
    {
        $this->validate([
            'gambardeskFiles.*' => 'image|max:' . self::MAX_IMAGE_SIZE,
        ]);

        foreach ($this->gambardeskFiles as $file) {
            $path = $file->store('proker/gambardesk', 'public');

            GambardeskCache::create([
                'path' => $path,
                'type' => $file->getClientMimeType(),
                'temp_id' => uniqid(),
                'user_id' => Auth::id(),
            ]);
        }

        $this->gambardesk = GambardeskCache::where('user_id', Auth::id())->get();
        $this->gambardeskFiles = [];
    }

    public function save()
    {
        $this->validate([
            'main_proker_id' => 'required|exists:tb_main_proker,id',
            'judul' => 'required|string|max:64',
            'gambar' => 'nullable|image|max:' . self::MAX_IMAGE_SIZE,
            'tanggal' => 'nullable|date',
            'deskripsi' => 'nullable',
            'tags' => 'array|max:' . self::MAX_TAGS,
            'tags.*' => 'nullable|string|max:50',
            'kategori' => 'required|in:primer,sekunder',
        ]);

        $gambarPath = $this->gambar
            ? $this->gambar->store('proker/images', 'public')
            : null;

        $gambardeskPaths = [];
        foreach ($this->gambardesk as $image) {
            $gambardeskPaths[] = $image->path;
        }

        $excerpt = substr(strip_tags($this->deskripsi), 0, 150);
        if (strlen(strip_tags($this->deskripsi)) > 150) {
            $excerpt .= '...';
        }

        $this->tanggal = Carbon::parse($this->tanggal);
        Proker::create([
            'main_proker_id' => $this->main_proker_id,
            'judul' => $this->judul,
            'gambar' => $gambarPath,
            'slug' => Str::slug($this->judul . '-' . $this->tanggal->format('Y-m-d')),
            'gambardesk' => $gambardeskPaths,
            'tanggal' => $this->tanggal,
            'deskripsi' => $this->deskripsi,
            'excerpt' => $excerpt,
            'tags' => $this->tags,
            'kategori' => $this->kategori,
            'author_id' => Auth::id(),
        ]);

        GambardeskCache::where('user_id', Auth::id())->delete();

        sweetalert()->success('Proker Berhasil Ditambahkan');
        return redirect()->route('admin.indexproker');
    }

    public function render()
    {
        return view('livewire.pages.admin.add-proker')->layout('layouts.app');
    }
}