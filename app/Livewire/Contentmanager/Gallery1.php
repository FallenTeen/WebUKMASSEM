<?php

namespace App\Livewire\Contentmanager;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Gallery1 extends Component
{
    public $items;
    public $limit;
    public $randomize;

    public function mount($limit = null, $randomize = false)
    {
        $this->limit = $limit;
        $this->randomize = $randomize;

        // Mengambil data dari tabel 'tb_proker' atau 'tb_main_proker'
        $query = DB::table('tb_proker')->where('judul', '!=', 'lain'); // Sesuaikan dengan kebutuhan Anda

        if ($this->randomize) {
            $query->inRandomOrder();
        }

        if ($this->limit) {
            $query->limit($this->limit);
        }

        // Ambil data gambar, judul, dan deskripsi
        $this->items = $query->get(['gambar', 'judul', 'deskripsi']);
    }

    public function render()
    {
        return view('livewire.contentmanager.gallery1');
    }
}
