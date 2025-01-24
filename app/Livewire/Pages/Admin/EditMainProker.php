<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\MainProker;

class EditMainProker extends Component
{
    use WithFileUploads;
    public $judul, $gambar;
    public $deskripsi, $gambardesk = [], $tags = [];
    public function mount($id)
    {
        $proker = MainProker::findOrFail($id);
        $this->judul = $proker->judul;
        $this->gambar = $proker->gambar;
        $this->deskripsi = $proker->deskripsi;
        $this->gambardesk = json_decode($proker->gambardesk, true);
    }

    public function save()
    {
        $this->validate([
            'judul' => 'required|string|max:64',
            'gambar' => 'nullable|image|max:8192',
            'deskripsi' => 'nullable|string',
            'gambardesk.*' => 'nullable|image|max:8192',
        ]);

        $gambarPath = $this->gambar
            ? $this->gambar->store('proker/images', 'public')
            : $this->gambar;

        $gambardeskPaths = $this->gambardesk
            ? collect($this->gambardesk)->map(fn($file) => $file->store('proker/gambardesk', 'public'))->toArray()
            : $this->gambardesk;

        $proker = MainProker::findOrFail($this->proker_id);
        $proker->update([
            'judul' => $this->judul,
            'gambar' => $gambarPath,
            'deskripsi' => $this->deskripsi,
            'gambardesk' => json_encode($gambardeskPaths),
        ]);
        $this->save();
        session()->flash('message', 'Proker successfully updated.');
        return redirect()->route('admin.indexmainproker');
    }

    public function render()
    {
        return view('livewire.pages.admin.edit-main-proker')->layout('layouts.app');
    }
}
