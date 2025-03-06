<?php

namespace App\Livewire\Contentmanager;

use Livewire\Component;
use App\Models\Proker;

class ProkerArticle extends Component
{
    public $id;
    public function mount($id)
    {
        $this->proker = Proker::find($id);
        if (!$this->proker) {
            abort(404);
        }
        $this->proker->judul = strtoupper($this->proker->judul); 
    }
    public function render()
    {
        return view('livewire.contentmanager.proker-article');
    }
}
