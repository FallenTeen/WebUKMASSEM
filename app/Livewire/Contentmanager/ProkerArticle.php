<?php

namespace App\Livewire\Contentmanager;

use Livewire\Component;
use App\Models\Proker;
use App\Models\MainProker;
use Illuminate\Support\Facades\Storage;

class ProkerArticle extends Component
{
    public $proker;
    public $relatedProkers;
    public $mainProker;
    public $activeImageIndex = 0;
    public $showFullScreenImage = false;
    public $fullScreenImageSrc = '';
    public $galleryImages = []; // Move this to a component property instead of model property

    public function mount($id)
    {
        $this->proker = Proker::with(['mainProker', 'author'])->findOrFail($id);
        $this->proker->judul = strtoupper($this->proker->judul);

        $this->mainProker = $this->proker->mainProker;

        // Get related prokers
        $this->relatedProkers = Proker::where('main_proker_id', $this->proker->main_proker_id)
            ->where('id', '!=', $this->proker->id)
            ->where('status', 'published')
            ->orderBy('tanggal', 'desc')
            ->take(3)
            ->get();

        // Process main image
        if ($this->proker->gambar) {
            $this->proker->gambarUrl = Storage::url($this->proker->gambar);
        } else {
            $this->proker->gambarUrl = 'https://placehold.co/600x400?text=No+Image';
        }

        // Process gallery images - store them in the component property instead
        $this->galleryImages = [];
        if (!empty($this->proker->gambardesk) && is_array($this->proker->gambardesk)) {
            foreach ($this->proker->gambardesk as $path) {
                if (!empty($path)) {
                    $this->galleryImages[] = Storage::url($path);
                }
            }
        }
    }

    public function setActiveImage($index)
    {
        $this->activeImageIndex = $index;
    }

    public function showFullScreenImage($src)
    {
        $this->fullScreenImageSrc = $src;
        $this->showFullScreenImage = true;
    }

    public function closeFullScreenImage()
    {
        $this->showFullScreenImage = false;
    }

    public function render()
    {
        return view('livewire.contentmanager.proker-article')->layout('layouts.custom');
    }
}