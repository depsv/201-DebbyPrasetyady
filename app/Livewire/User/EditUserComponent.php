<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class EditUserComponent extends Component
{
    public $userId;
    public $name;
    public $email;
    public $oldPassword;
    public $newPassword;
    public $isAdmin;

    public function mount($userId)
    {
        $this->userId = $userId;
        $user = User::findOrFail($userId);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->isAdmin = $user->is_admin ? true : false;
    }

    public function render()
    {
        return view('livewire.user.edit-user-component')
            ->layout('layouts.app');
    }

    public function updateUser()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$this->userId,
            'oldPassword' => 'required',
            'newPassword' => 'nullable|string|min:8|different:oldPassword',
        ]);

        $user = User::findOrFail($this->userId);

        if (!Hash::check($validatedData['oldPassword'], $user->password)) {
            $this->addError('oldPassword', 'The old password is incorrect.');
            return;
        }

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        if ($validatedData['newPassword']) {
            $user->password = Hash::make($validatedData['newPassword']);
        }

        $user->save();

        session()->flash('message', 'User updated successfully.');
        return redirect()->to('/users');
    }
}
