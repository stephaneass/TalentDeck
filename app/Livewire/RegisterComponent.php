<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegisterComponent extends Component
{
    public $email, $password, $first_name, $password_confirmation;

    public function render()
    {
        return view('livewire.auth.register')
        ->extends('livewire.auth.layout', ['title' => "Registration"]);
    }



    public function register()
    {
        $this->validate([
            'first_name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        $data = [
            'first_name' => $this->first_name,
            'email' => $this->email,
            'password' => $this->password,
        ];
        

        $result = User::addNew($data);

        dd("good");
    }
}
