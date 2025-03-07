<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use App\Models\Proker;
use App\Models\MainProker;
use App\Models\GambardeskCache;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EditProker extends Component
{
    use WithFileUploads;

    const MAX_GAMBAR_DESK = 5;
    const MAX_IMAGE_SIZE = 8192;

    public $prokerId;
    public $judul;
    public $main_proker_id;
    public $gambar;
    public $tanggal;
    public $kategori;
    public $deskripsi;
    public $excerpt;
    public $status;

    public $existingGambar;
    public $existingGambarDesk = [];
    public $maxGambarDesk = 5;
    public $gambardesk = [];
    public $gambardeskFiles = [];
    public $tags = [];
    public $tagInput;
    public $allMainProkers = [];

    protected $rules = [
        'main_proker_id' => 'required|exists:tb_main_proker,id',
        'judul' => 'required|string|max:64',
        'gambar' => 'nullable|image|max:8192',
        'tanggal' => 'nullable|date',
        'deskripsi' => 'nullable|string',
        'excerpt' => 'nullable|string',
        'gambardeskFiles.*' => 'nullable|image|max:8192',
        'tags' => 'array',
        'tags.*' => 'nullable|string|max:50',
        'kategori' => 'required|in:primer,sekunder',
        'status' => 'required|in:draft,published',
    ];

    public function mount($id)
    {
        $this->prokerId = $id;
        $proker = Proker::findOrFail($id);

        $this->judul = $proker->judul;
        $this->main_proker_id = $proker->main_proker_id;
        $this->tanggal = $proker->tanggal ? $proker->tanggal->format('Y-m-d') : null;
        $this->kategori = $proker->kategori;
        $this->deskripsi = $proker->deskripsi;
        $this->excerpt = $proker->excerpt;
        $this->status = $proker->status;
        $this->existingGambar = $proker->gambar;
        $this->tags = $proker->tags ?? [];
        $this->existingGambarDesk = $proker->gambardesk ?? [];

        $this->allMainProkers = MainProker::all();

        // Clear any existing cached images for this user
        GambardeskCache::where('user_id', Auth::id())->delete();

        // Import existing gambardesk images into cache
        foreach ($this->existingGambarDesk as $path) {
            GambardeskCache::create([
                'path' => $path,
                'type' => 'image/jpeg', // Default assumption
                'temp_id' => uniqid(),
                'user_id' => Auth::id(),
            ]);
        }

        // Load cached images
        $this->loadCachedImages();
    }

    public function loadCachedImages()
    {
        $this->gambardesk = GambardeskCache::where('user_id', Auth::id())->get();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addTag()
    {
        if (empty(trim($this->tagInput))) {
            return;
        }

        $this->validate([
            'tagInput' => 'required|string|max:50',
        ]);

        if (count($this->tags) >= 5) {
            session()->flash('tag_error', 'Maximum 5 tags allowed');
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
            // Only delete from storage if it's not one of the original images
            $isOriginalImage = in_array($image->path, $this->existingGambarDesk);

            if (!$isOriginalImage && Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }

            $image->delete();
            $this->loadCachedImages();
        }
    }

    public function updatedGambardeskFiles()
    {
        $this->validate([
            'gambardeskFiles.*' => 'image|max:' . self::MAX_IMAGE_SIZE,
        ]);

        // Check if adding these files would exceed the maximum
        if (count($this->gambardesk) + count($this->gambardeskFiles) > self::MAX_GAMBAR_DESK) {
            session()->flash('image_error', 'Maximum ' . self::MAX_GAMBAR_DESK . ' images allowed');
            $this->gambardeskFiles = [];
            return;
        }

        foreach ($this->gambardeskFiles as $file) {
            $path = $file->store('proker/gambardesk', 'public');

            GambardeskCache::create([
                'path' => $path,
                'type' => $file->getClientMimeType(),
                'temp_id' => uniqid(),
                'user_id' => Auth::id(),
            ]);
        }

        $this->loadCachedImages();
        $this->gambardeskFiles = [];
    }

    public function save()
    {
        $this->validate();

        $proker = Proker::findOrFail($this->prokerId);

        // Handle main image
        if ($this->gambar && is_object($this->gambar) && method_exists($this->gambar, 'store')) {
            if ($proker->gambar && Storage::disk('public')->exists($proker->gambar)) {
                Storage::disk('public')->delete($proker->gambar);
            }

            $gambarPath = $this->gambar->store('proker/images', 'public');
        } else {
            $gambarPath = $this->existingGambar;
        }

        // Get all gambardesk paths from cache
        $gambardeskPaths = $this->gambardesk->pluck('path')->toArray();

        // Generate excerpt
        if (empty($this->excerpt) && !empty($this->deskripsi)) {
            $excerpt = substr(strip_tags($this->deskripsi), 0, 150);
            if (strlen(strip_tags($this->deskripsi)) > 150) {
                $excerpt .= '...';
            }
        } else {
            $excerpt = $this->excerpt;
        }

        $tanggal = $this->tanggal ? Carbon::parse($this->tanggal) : null;
        $slug = Str::slug($this->judul . '-' . ($tanggal ? $tanggal->format('Y-m-d') : date('Y-m-d')));

        $proker->update([
            'main_proker_id' => $this->main_proker_id,
            'judul' => $this->judul,
            'slug' => $slug,
            'gambar' => $gambarPath,
            'tanggal' => $tanggal,
            'deskripsi' => $this->deskripsi,
            'excerpt' => $excerpt,
            'gambardesk' => $gambardeskPaths,
            'tags' => $this->tags,
            'kategori' => $this->kategori,
            'status' => $this->status,
        ]);

        // Clean up cache
        GambardeskCache::where('user_id', Auth::id())->delete();

        sweetalert()->success('Program Kerja Berhasil Diupdate');
        return redirect()->route('admin.indexproker');
    }

    public function render()
    {
        return view('livewire.pages.admin.edit-proker')->layout('layouts.app');
    }
}