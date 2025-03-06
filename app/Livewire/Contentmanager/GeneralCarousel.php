<?php

namespace App\Livewire\Contentmanager;

use Livewire\Component;
use App\Models\Proker;
use App\Models\MainProker;

class GeneralCarousel extends Component
{
    public $items;
    public $limit;
    public $randomize;
    public $spesifikProker;

    public function mount($limit = 5, $randomize = false, $spesifikProker = null)
    {
        $this->limit = $limit;
        $this->randomize = $randomize;
        $this->spesifikProker = $spesifikProker;

        $query = Proker::query();

        if ($this->spesifikProker) {
            $mainProker = MainProker::where('judul', $this->spesifikProker)->first();
            if ($mainProker) {
                $query->where('main_proker_id', $mainProker->id);
            }
        }

        if ($this->randomize) {
            $query->inRandomOrder();
        }

        if ($this->limit) {
            $query->limit($this->limit);
        }

        $this->items = $query->get(['id', 'gambar', 'judul', 'deskripsi', 'tanggal'])->map(function ($item) {
            $item->gambar = $item->gambar ? 'storage/' . $item->gambar : 'storage/images/bg.png';
            return $item;
        });
    }

    public function render()
    {
        return view('livewire.contentmanager.general-carousel');
    }
}