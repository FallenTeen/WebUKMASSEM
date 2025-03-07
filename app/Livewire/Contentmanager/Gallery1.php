<?php

namespace App\Livewire\Contentmanager;

use Livewire\Component;
use App\Models\Proker;

class Gallery1 extends Component
{
    public $items = [];
    public $limit, $randomize;
    public $searchTerm = '';
    public $startDate, $endDate;

    public function mount($limit = 13, $randomize = false)
    {
        $this->limit = $limit;
        $this->randomize = $randomize;
        $this->loadItems();
    }

    public function loadItems()
    {
        $query = Proker::query();

        if ($this->randomize) {
            $query->inRandomOrder();
        }

        if ($this->searchTerm) {
            $query->where(function ($q) {
                $q->where('judul', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('deskripsi', 'like', '%' . $this->searchTerm . '%');
            });
        }

        if ($this->startDate && $this->endDate) {
            $startDate = $this->startDate . '-01';
            $endDate = $this->endDate . '-01';
            $query->whereBetween('tanggal', [$startDate, $endDate]);
        }
        $query->limit($this->limit);

        $this->items = $query->get(['id','gambar', 'judul', 'deskripsi', 'tanggal']);
    }
    public function updatedSearchTerm()
    {
        $this->limit = 13;
        $this->loadItems();
    }
    
    public function updated($propertyName)
    {
        if ($propertyName == 'startDate' || $propertyName == 'endDate') {
            $this->loadItems();
        }
    }

    public function loadMore()
    {
        $this->limit += 13;
        $this->loadItems();
    }

    public function resetSearch()
    {
        $this->searchTerm = strip_tags($this->searchTerm); //Biar Gak kena xss coyy
        $this->loadItems(); // Reload data
    }

    public function render()
    {
        return view('livewire.contentmanager.gallery1', [
            'items' => $this->items,
        ]);
    }
}
