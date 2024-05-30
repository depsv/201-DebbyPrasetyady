<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class EditUserComponent extends Component
{
    public $userId;
    public $name;
    public $email;
    public $password;

    public function mount($userId)
    {
        $this->userId = $userId;
        $user = User::findOrFail($userId);
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function render()
    {
        return view('livewire.edit-user-component');
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
