<?php

namespace App\Livewire\Transaction;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;
use App\Models\Service;

class TransactionComponent extends Component
{
    use WithPagination;

    public $showingDetailTransaction = false;

    public function render()
    {
        $transactions = Transaction::with('user', 'details.service')->paginate(10);

        return view('livewire.transaction.transaction-component', ['transactions' => $transactions])->layout('layouts.app');
    }

    public function showDetailTransaction($id)
    {
        $this->showingDetailTransaction = $id;
    }
}
