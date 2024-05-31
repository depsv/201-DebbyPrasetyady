<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;

class HistoryComponent extends Component
{
    use WithPagination;

    public $showingDetailTransaction = false;

    public function render()
    {
        $trxs = Transaction::where('user_id', '=', Auth::user()->id)->orderBy('created_at','desc')->with('details.service')->paginate(10);

        return view('livewire.history.history-component', ['trxs' => $trxs])->layout('layouts.app');
    }

    public function showDetailTransaction($id)
    {
        $this->showingDetailTransaction = $id;
    }
}
