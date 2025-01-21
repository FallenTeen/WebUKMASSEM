<?php

namespace App\Livewire\Contentmanager;

use Livewire\Component;
use App\Models\Proker;

class KaryaCarousel extends Component
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
        $items = $query->get(['id','gambar', 'judul', 'deskripsi']);

        $this->items = $items->map(function ($item) {
            $item->gambar = asset('/images/bg.png');
            return $item;
        });

        // $this->items = $items->map(function ($item) {
        //     $item->gambar = $item->gambar ? $item->gambar : asset('storage/images/bg.png');
        //     return $item;
        // });

    }
    public function render()
    {
        return view('livewire.contentmanager.karya-carousel');
    }
}
