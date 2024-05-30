<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class AddUserComponent extends Component
{
    public $name;
    public $email;
    public $password;
    public $isAdmin;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
    ];

    public function render()
    {
        return view('livewire.add-user-component');
    }

    public function addUser()
    {
        $this->validate();

        if ($this->isAdmin == 'on') {
            $this->isAdmin = true;
        } else {
            $this->isAdmin = false;
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'is_admin' => $this->isAdmin,
        ]);

        session()->flash('message', 'User added successfully.');

        return redirect()->to('users');
    }
}
