<?php

namespace App\Livewire\Contentmanager;

use Livewire\Component;
use App\Models\MainProker;

class MainProkerArticle extends Component
{
    public $proker;
    public function mount($proker)
    {
        $this->proker = MainProker::where('judul', $proker)->first();
        if (!$this->proker) {
            abort(404); 
        }
    }
    public function render()
    {
        return view('livewire.contentmanager.main-proker-article')->layout('layouts.custom');
    }
}
