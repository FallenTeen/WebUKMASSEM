<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use App\Models\MainProker;
use Livewire\WithPagination;

class IndexMainProker extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 10;

    public function mount()
    {
        $this->prokers = MainProker::orderBy('id', 'desc')->paginate($this->perPage);
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function deleteMainProker($id)
    {
        $prokers = MainProker::find($id);
        if ($prokers) {
            $prokers->delete();
            session()->flash('message', 'Proker deleted successfully.');
        }
    }

    public function render()
    {
        $prokers = MainProker::when($this->search, function ($query) {
            $query->where('judul', 'like', '%' . $this->search . '%')
                ->orWhere('id', 'like', '%' . $this->search . '%');
        })
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);

        return view('livewire.pages.admin.index-main-proker', [
            'prokers' => $prokers,
        ])->layout('layouts.app');
    }
}
