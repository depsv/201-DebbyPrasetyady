<?php

namespace App\Livewire;

use Livewire\Component;

class OrdersComponent extends Component
{
    public function render()
    {
        return view('livewire.order.order-component')->layout('layouts.app');
    }
}
