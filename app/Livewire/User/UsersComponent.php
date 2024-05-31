<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UsersComponent extends Component
{
    use WithPagination;

    public $confirmingUserDeletion = false;

    public function render()
    {
        $users = User::paginate(10);

        return view('livewire.user.users-component', ['users' => $users])
        ->layout('layouts.app');
    }

    public function confirmUserDeletion($id)
    {
        $this->confirmingUserDeletion = $id;
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        $this->confirmingUserDeletion = false;
        session()->flash('message', 'User has been deleted successfully!');
    }
}
