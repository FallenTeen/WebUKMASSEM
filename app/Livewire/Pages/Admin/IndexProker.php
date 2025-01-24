<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use App\Models\Proker;
use Livewire\WithPagination;

class IndexProker extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 10;
    public function mount()
    {
        $this->prokers = Proker::orderBy('id', 'desc')->paginate($this->perPage);
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function deleteProker($id)
    {
        $proker = Proker::find($id);
        if ($proker) {
            $proker->delete();
            sweetalert()->success('Proker Berhasil DiHapus');
            return redirect()->route('admin.indexproker');
        }
    }


    public function render()
    {
        $prokers = Proker::when($this->search, function ($query) {
            $query->where('judul', 'like', '%' . $this->search . '%')
                ->orWhere('tanggal', 'like', '%' . $this->search . '%')
                ->orWhere('id', 'like', '%' . $this->search . '%');
        })
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);

        return view('livewire.pages.admin.index-proker', ['prokers' => $prokers])
            ->layout('layouts.app');
    }
}
