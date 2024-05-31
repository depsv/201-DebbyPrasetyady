<?php

namespace App\Livewire\Service;

use App\Models\Service;
use Livewire\Component;

class AddServiceComponent extends Component
{
    public $name;
    public $description;
    public $unit;
    public $price;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'unit' => 'required|string',
        'price' => 'required|numeric',
    ];

    public function addService()
    {
        $this->validate();

        Service::create([
            'name' => $this->name,
            'description' => $this->description,
            'unit' => $this->unit,
            'price' => $this->price,
        ]);

        session()->flash('message', 'Service added successfully.');

        return redirect()->to('services');
    }

    public function render()
    {
        return view('livewire.service.add-service-component')->layout('layouts.app');
    }
}
