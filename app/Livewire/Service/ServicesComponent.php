<?php

namespace App\Livewire\Service;

use Livewire\Component;
use App\Models\Service;
use Livewire\WithPagination;

class ServicesComponent extends Component
{
    use WithPagination;

    public $confirmingServiceDeletion = false;

    public function render()
    {
        $services = Service::paginate(10);

        return view('livewire.service.services-component', ['services' => $services])->layout('layouts.app');
    }

    public function confirmServiceDeletion($id)
    {
        $this->confirmingServiceDeletion = $id;
    }

    public function deleteService($id)
    {
        $service = Service::find($id);
        $service->delete();
        $this->confirmingServiceDeletion = false;
        session()->flash('message', 'Service has been deleted successfully!');
    }
}
