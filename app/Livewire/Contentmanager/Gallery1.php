<?php
namespace App\Livewire\Contentmanager;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Gallery1 extends Component
{
    public $items, $limit, $randomize;
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
        $query = DB::table('tb_proker');

        if ($this->randomize) {
            $query->inRandomOrder();
        }

        if ($this->limit) {
            $query->limit($this->limit);
        }

        if ($this->searchTerm) {
            $query->where(function ($query) {
                $query->where('judul', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('deskripsi', 'like', '%' . $this->searchTerm . '%');
            });
        }

        if ($this->startDate && $this->endDate) {
            $startDate = $this->startDate . '-01';
            $endDate = $this->endDate . '-01'; 

            $query->whereBetween('tanggal', [$startDate, $endDate]);
        }
        $this->items = $query->get(['gambar', 'judul', 'deskripsi', 'url', 'tanggal']);
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'startDate' || $propertyName == 'endDate') {
            $this->loadItems();
        }
    }
    public function loadMore(){
        $this->limit += 13;
    }

    public function resetSearch()
    {
        $this->searchTerm = ''; // Reset pencarian
        $this->loadItems(); // Memuat ulang data tanpa filter pencarian
    }

    public function render()
    {
        $this->loadItems();
        return view('livewire.contentmanager.gallery1');
    }
}