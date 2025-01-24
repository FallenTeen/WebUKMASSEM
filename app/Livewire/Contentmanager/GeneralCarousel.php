<?php

namespace App\Livewire\Contentmanager;

use Livewire\Component;
use App\Models\Proker;
use Illuminate\Support\Facades\Storage;
class GeneralCarousel extends Component
{
    public $items;
    public $limit;
    public $randomize;

    public function mount($limit = 5, $randomize = false)
    {
        $this->limit = $limit;
        $this->randomize = $randomize;
        $query = Proker::query()->where('judul', '!=', 'lain');

        if ($this->randomize) {
            $query->inRandomOrder();
        }

        if ($this->limit) {
            $query->limit($this->limit);
        }
        $items = $query->get(['id', 'gambar', 'judul', 'deskripsi', 'tanggal']);


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
        return view('livewire.contentmanager.general-carousel');
    }
}
