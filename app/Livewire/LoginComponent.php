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

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        

        if(Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
            dd("good");
            
        }else{
            session()->flash('error', 'Email ou mot de passe invalide.');
        }
    }
}
