<?php

namespace App\Livewire\Contentmanager;

use Livewire\Component;
use App\Models\MainProker;

class MainProkerCard extends Component
{
    public $prokers, $containerClass;
    public function mount($containerClass = 'flex flex-wrap gap-4 mx-auto justify-center')
    {
        $this->prokers = MainProker::whereHas('prokers', function ($query) {
            $query->where('judul', '!=', 'lain');
        })->get();
    }
    public function render()
    {
        return view('livewire.contentmanager.main-proker-card', [
            'prokers' => $this->prokers,
            'containerClass'=>$this->containerClass,
        ]);
    }
}
