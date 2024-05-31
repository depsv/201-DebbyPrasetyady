<?php

namespace App\Livewire\Service;

use Livewire\Component;
use App\Models\Service;

class EditServiceComponent extends Component
{
    public $serviceId;
    public $name;
    public $description;
    public $unit;
    public $price;

    public function mount($serviceId)
    {
        $this->serviceId = $serviceId;
        $service = Service::findOrFail($serviceId);
        $this->name = $service->name;
        $this->description = $service->description;
        $this->unit = $service->unit;
        $this->price = $service->price;
    }

    public function updateService()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'unit' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $service = Service::findOrFail($this->serviceId);
        $service->name = $validatedData['name'];
        $service->description = $validatedData['description'];
        $service->unit = $validatedData['unit'];
        $service->price = $validatedData['price'];
        $service->save();

        session()->flash('message', 'Service updated successfully.');
        return redirect()->to('/services');
    }

    public function render()
    {
        return view('livewire.service.edit-service-component')->layout('layouts.app');
    }
}
