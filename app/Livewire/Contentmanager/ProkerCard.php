<?php

namespace App\Livewire\Contentmanager;

use Livewire\Component;
use App\Models\MainProker;
use Illuminate\Support\Facades\DB;

class ProkerCard extends Component
{
    public $prokers, $table, $limit, $randomize, $all, $containerClass;

    public function mount($proker = 'mainproker', $limit = null, $randomize = false, $all = false, $containerClass = 'flex flex-wrap gap-4 mx-auto justify-center')
    {
        
        $this->table = $proker === 'mainproker' ? 'tb_main_proker' : 'tb_proker';
        $this->limit = $limit;
        $this->randomize = $randomize;
        $this->all = $all;
        $this->containerClass = $containerClass;

        $query = DB::table($this->table)->where('judul', '!=', 'lain');

        if ($this->randomize) {
            $query->inRandomOrder();
        }

        if (!$this->all && $this->limit) {
            $query->limit($this->limit);
        }

        $this->prokers = $query->get();
    }

    public function render()
    {
        return view('livewire.contentmanager.proker-card', [
            'prokers' => $this->prokers,
            'containerClass' => $this->containerClass,
        ]);
    }
}
