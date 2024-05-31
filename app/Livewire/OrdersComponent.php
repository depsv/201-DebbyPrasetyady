<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\DetailTransaction;

class OrdersComponent extends Component
{
    public $services;
    public $selectedServiceId;
    public $quantity;
    public $notes;
    public $orders = [];

    public function mount()
    {
        if (session()->has('orders')) {
            $this->orders = session()->get('orders');
        }

        $this->services = Service::all();
        $this->quantity = '';
        $this->notes = '';
    }

    public function addOrder()
    {
        // Jika selectedServiceId tidak ada, langsung kembalikan
        if (!$this->selectedServiceId) {
            return;
        }

        $selectedService = Service::find($this->selectedServiceId);

        $this->orders[] = [
            'service_id' => $selectedService->id,
            'service' => $selectedService->name,
            'unit' => $selectedService->unit,
            'price' => $selectedService->price,
            'quantity' => $this->quantity,
            'notes' => $this->notes,
            'total' => $selectedService->price * $this->quantity,
        ];

        // Reset input fields
        $this->selectedServiceId = null;
        $this->quantity = '';
        $this->notes = '';

        // Simpan data order ke dalam flash session
        session()->flash('orders', $this->orders);
    }

    public function submitOrders()
    {
        if (empty($this->orders)) {
            return;
        }

        \DB::beginTransaction();

        try {
            $transaction = Transaction::create([
                'user_id' => auth()->id(),
                'amount' => collect($this->orders)->sum('total'),
                'status' => 'pending',
            ]);

            foreach ($this->orders as $order) {
                $detail = DetailTransaction::create([
                    'transaction_id' => $transaction->id,
                    'service_id' => $order['service_id'],
                    'qty' => $order['quantity'],
                    'total' => $order['total'],
                    'notes' => $order['notes'],
                ]);
            }

            \DB::commit();

            session()->forget('orders');

            session()->flash('message', 'Orders submitted successfully.');
            return redirect()->to('orders');
        } catch (\Exception $e) {
            \DB::rollback();

            session()->flash('error', 'Failed to submit orders. Please try again later.');
        }
    }

    public function render()
    {
        return view('livewire.order.order-component')->layout('layouts.app');
    }
}
