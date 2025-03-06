<?php

namespace App\Livewire\Contentmanager;

use Livewire\Component;
use App\Models\MainProker;
use App\Models\Proker;
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
            $query = MainProker::query()->where('judul', '!=', 'lain');

            if ($this->randomize) {
                $query = $query->inRandomOrder();
            }

            if ($this->limit) {
                $query = $query->limit($this->limit);
            }

            $this->prokers = $query->get();
        } elseif ($this->proker === 'allproker') {
            $query = Proker::query();
            // $query = Proker::where('judul', '!=', 'lain')->get();

            if ($this->randomize) {
                $query = $query->inRandomOrder();
            }

            if ($this->limit) {
                $query = $query->limit($this->limit);
            }

            $this->prokers = $query->get();
        } else {
            $query = Proker::query()->where('judul', '!=', 'lain')->where('proker', $this->proker);
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
