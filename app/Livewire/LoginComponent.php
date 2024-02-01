<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginComponent extends Component
{
    public $email, $password;

    public function render()
    {
        return view('livewire.auth.login')
        ->extends('livewire.auth.layout', ['title' => "Connexion"]);
    }
}
