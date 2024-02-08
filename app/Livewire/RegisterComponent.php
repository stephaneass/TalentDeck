<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegisterComponent extends Component
{
    public $email, $password;

    public function render()
    {
        return view('livewire.auth.register')
        ->extends('livewire.auth.layout', ['title' => "Registration"]);
    }
}
