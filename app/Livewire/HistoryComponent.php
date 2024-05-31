<?php

namespace App\Livewire;

use Livewire\Component;

class HistoryComponent extends Component
{
    public function render()
    {
        return view('livewire.history.history-component')->layout('layouts.app');
    }
}
