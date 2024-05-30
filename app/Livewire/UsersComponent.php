<?php

namespace App\Livewire;

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

        return view('livewire.users-component', ['users' => $users]);
    }

    public function redirectToAddUser()
    {
        return redirect()->to('users/add');
    }

    public function redirectToEditUser($userId)
    {
        return redirect()->to('/users/edit/' . $userId);
    }

    public function confirmUserDeletion($id)
    {
        $this->confirmingUserDeletion = $id;
    }
}
