<?php

namespace App\Livewire\Contentmanager;

use Livewire\Component;
use App\Models\Proker;

class ProkerArticle extends Component
{
    public $idproker;
    public function mount($idproker)
    {
        $this->proker = Proker::where('id', $idproker)->first();
        if (!$this->proker) {
            abort(404);
        }
        $this->proker->judul = convertToUpperCase($this->proker->judul);
    }
    public function render()
    {
        return view('livewire.contentmanager.proker-article');
    }
}
