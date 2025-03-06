<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use App\Models\MainProker;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;

class IndexMainProker extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 10;
    public $sortField = 'id', $sortDirection = 'asc';
    public $status = '', $category = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => ''],
        'status' => ['except' => ''],
        'page' => ['except' => 1]
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortField === $field
            ? ($this->sortDirection === 'asc' ? 'desc' : 'asc')
            : 'asc';

        $this->sortField = $field;
    }

    public function toggleFilter($filterType)
    {
        switch ($filterType) {
            case 'active':
                $this->status = 'active';
                break;
            case 'upcoming':
                $this->status = 'upcoming';
                break;
            case 'completed':
                $this->status = 'completed';
                break;
            default:
                $this->status = '';
        }
        $this->resetPage();
    }

    public function deleteMainProker($id)
    {
        try {
            $proker = MainProker::findOrFail($id);
            $proker->delete();

            session()->flash('message', 'Program successfully deleted.');
        } catch (\Exception $e) {
            Log::error("Error deleting MainProker: " . $e->getMessage());
            session()->flash('error', 'Failed to delete the program. Please try again.');
        }
    }

    public function getCategories()
    {
        return MainProker::distinct('kategori')
            ->whereNotNull('kategori')
            ->pluck('kategori');
    }

    public function render()
    {
        $query = MainProker::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('judul', 'like', '%' . $this->search . '%')
                        ->orWhere('deskripsi', 'like', '%' . $this->search . '%')
                        ->orWhere('id', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->category, function ($query) {
                $query->where('kategori', $this->category);
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            });

        $query->orderBy($this->sortField, $this->sortDirection);

        $prokers = $query->paginate($this->perPage);

        return view('livewire.pages.admin.index-main-proker', [
            'prokers' => $prokers,
            'categories' => $this->getCategories(),
        ])->layout('layouts.app');
    }
}