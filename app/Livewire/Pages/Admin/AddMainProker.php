<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use App\Models\MainProker;
class AddMainProker extends Component
{
    public function render()
    {
        return view('livewire.pages.admin.add-main-proker')->layout('layouts.app');
    }
}
