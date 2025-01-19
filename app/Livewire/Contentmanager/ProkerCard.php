<?php

namespace App\Livewire\Contentmanager;

use Livewire\Component;
use App\Models\MainProker;
use Illuminate\Support\Facades\DB;

class ProkerCard extends Component
{
    public $prokers, $table, $limit, $randomize, $all, $containerClass;

    public function mount($proker = 'allproker', $limit = null, $randomize = false, $all = false, $containerClass = 'flex flex-wrap gap-4 mx-auto justify-center')
    {
        $this->proker = $proker;
        $this->limit = $limit;
        $this->randomize = $randomize;
        $this->all = $all;
        $this->containerClass = $containerClass;

        // Menangani kondisi untuk menampilkan data berdasarkan kategori
        if ($this->proker === 'mainproker') {
            // Menampilkan kategori utama dari tabel 'tb_main_proker'
            $this->prokers = DB::table('tb_main_proker')->get();
        } elseif ($this->proker === 'allproker') {
            // Menampilkan semua proker dari tabel 'tb_proker'
            $query = DB::table('tb_proker')->where('judul', '!=', 'lain');

            if ($this->randomize) {
                $query->inRandomOrder();
            }

            if ($this->limit) {
                $query->limit($this->limit);
            }

            $this->prokers = $query->get();
        } else {
            // Menampilkan proker berdasarkan kategori tertentu dari 'tb_proker'
            $query = DB::table('tb_proker')->where('judul', '!=', 'lain')->where('proker', $this->proker);

            if ($this->randomize) {
                $query->inRandomOrder();
            }

            if ($this->limit) {
                $query->limit($this->limit);
            }

            $this->prokers = $query->get();
        }
    }

    public function render()
    {
        return view('livewire.contentmanager.proker-card', [
            'prokers' => $this->prokers,
            'containerClass' => $this->containerClass,
        ]);
    }
}
