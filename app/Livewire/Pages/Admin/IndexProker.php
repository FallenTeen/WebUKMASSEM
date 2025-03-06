<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use App\Models\Proker;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;

class IndexProker extends Component
{
    use WithPagination;

    // Search and filtering
    public $search = '';
    public $perPage = 10;
    public $sortField = 'id';
    public $sortDirection = 'desc';
    public $kategori = '';
    public $status = '';

    // Filter options
    protected $queryString = [
        'search' => ['except' => ''],
        'kategori' => ['except' => ''],
        'status' => ['except' => ''],
        'page' => ['except' => 1]
    ];

    // Reset pagination when search changes
    public function updatedSearch()
    {
        $this->resetPage();
    }

    // Sort functionality
    public function sortBy($field)
    {
        $this->sortDirection = $this->sortField === $field
            ? ($this->sortDirection === 'asc' ? 'desc' : 'asc')
            : 'asc';

        $this->sortField = $field;
    }

    // Toggle status filter
    public function toggleFilter($filterType)
    {
        switch ($filterType) {
            case 'published':
                $this->status = 'published';
                break;
            case 'draft':
                $this->status = 'draft';
                break;
            default:
                $this->status = '';
        }
        $this->resetPage();
    }

    // Delete Proker with error handling
    public function deleteProker($id)
    {
        try {
            $proker = Proker::findOrFail($id);

            // Optional: Add soft delete or additional checks
            $proker->delete();

            // Log deletion for audit
            Log::info("Proker deleted: ID {$id} by user " . auth()->id());

            // Use SweetAlert for notification
            sweetalert()->success('Proker Berhasil DiHapus');

            return redirect()->route('admin.indexproker');
        } catch (\Exception $e) {
            Log::error("Error deleting Proker: " . $e->getMessage());

            // Use SweetAlert for error notification
            sweetalert()->error('Gagal Menghapus Proker');

            return redirect()->route('admin.indexproker');
        }
    }

    // Get available categories dynamically
    public function getKategories()
    {
        return Proker::distinct('kategori')
            ->whereNotNull('kategori')
            ->pluck('kategori');
    }

    public function render()
    {
        // Build query with multiple filters and sorting
        $query = Proker::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('judul', 'like', '%' . $this->search . '%')
                        ->orWhere('deskripsi', 'like', '%' . $this->search . '%')
                        ->orWhere('id', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->kategori, function ($query) {
                $query->where('kategori', $this->kategori);
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            });

        // Apply sorting
        $query->orderBy($this->sortField, $this->sortDirection);

        // Paginate results
        $prokers = $query->paginate($this->perPage);

        return view('livewire.pages.admin.index-proker', [
            'prokers' => $prokers,
            'kategories' => $this->getKategories(),
        ])->layout('layouts.app');
    }
}