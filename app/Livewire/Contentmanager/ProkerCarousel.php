<?php

namespace App\Livewire\Contentmanager;

use Livewire\Component;
use App\Models\Proker;
use App\Models\MainProker;

class ProkerCarousel extends Component
{
    public $items;
    public $limit;
    public $randomize;

    public function mount($limit = 5, $randomize = false, $proker = "")
    {
        $this->limit = $limit;
        $this->randomize = $randomize;
        $query = Proker::where('proker', $proker);

        if ($this->randomize) {
            $query->inRandomOrder();
        }

        if ($this->limit) {
            $query->limit($this->limit);
        }
        $items = $query->get(['gambar', 'judul', 'deskripsi', 'gambardesk']);


        $this->items = $items->map(function ($item) {
            if ($item->gambar) {
                $item->gambar = 'storage/' . $item->gambar;
            } else {
                $item->gambar = 'storage/images/bg.png';
            }
            return $item;
        });
    }
    public function render()
    {
        return view('livewire.contentmanager.proker-carousel');
    }
}
