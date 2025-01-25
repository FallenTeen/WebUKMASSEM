<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Proker;
use App\Models\MainProker;

class AddProker extends Component
{
    use WithFileUploads;
    public $step = 1;
    public $judul, $main_proker_id, $gambar, $tanggal, $kategori, $allMainProkers, $tagInput;
    public $deskripsi, $gambardesk = [], $tags = [];

    protected $rules = [
        'main_proker_id' => 'required|exists:tb_main_proker,id',
        'judul' => 'required|string|max:64',
        'gambar' => 'nullable|image|max:8192',
        'tanggal' => 'nullable|date',
        'deskripsi' => 'nullable|string',
        'gambardesk.*' => 'nullable|image|max:8192',
        'tags.*' => 'nullable|string|max:50',
        'kategori' => 'required|in:primer,sekunder'
    ];

    public function mount()
    {
        $this->allMainProkers = MainProker::all();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function nextStep()
    {
        $rules = $this->rulesForStep();
        $this->validate($rules);
        $this->step++;
    }

    public function prevStep()
    {
        $this->step--;
    }

    public function rulesForStep()
    {
        return match ($this->step) {
            1 => [
                'main_proker_id' => 'required|exists:tb_main_proker,id',
                'judul' => 'required|string|max:64',
                'gambar' => 'nullable|image|max:8192',
                'tanggal' => 'nullable|date',
                'kategori' => 'required|in:primer,sekunder',
            ],
            2 => [
                'deskripsi' => 'nullable|string',
                'gambardesk.*' => 'nullable|image|max:8192',
                'tags.*' => 'nullable|string|max:50',
            ],
            default => [],
        };
    }

    public function addTag()
    {
        if (!empty($this->tagInput) && !in_array($this->tagInput, $this->tags)) {
            $this->tags[] = $this->tagInput;
            $this->tagInput = ''; // Clear the input after adding
        }
    }

    public function removeTag($index)
    {
        unset($this->tags[$index]);
        $this->tags = array_values($this->tags); // Reindex the array
    }
    public function save()
    {
        $gambarPath = $this->gambar
            ? $this->gambar->store('proker/images', 'public')
            : null;

        $gambardeskPaths = $this->gambardesk
            ? collect($this->gambardesk)->map(fn($file) => $file->store('proker/gambardesk', 'public'))->toArray()
            : [];
        Proker::create([
            'main_proker_id' => $this->main_proker_id,
            'judul' => $this->judul,
            'gambar' => $gambarPath,
            'tanggal' => $this->tanggal,
            'deskripsi' => $this->deskripsi,
            'gambardesk' => json_encode($gambardeskPaths),
            'tags' => json_encode($this->tags),
            'kategori' => $this->kategori,
        ]);


        sweetalert()->success('Proker Berhasil Ditambahkan');
        return redirect()->route('admin.indexproker');
    }

    public function render()
    {
        return view('livewire.pages.admin.add-proker')->layout('layouts.app');
    }
}
