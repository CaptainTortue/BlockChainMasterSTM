<?php

namespace App\Livewire;

use Livewire\Component;

class LoginPage extends Component
{
    public $login;
    public $password;

    public function render()
    {
        return view('livewire.login-page');
    }

    public function loginUser()
    {
        $this->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($this->only('login', 'password'))) {
            return redirect()->intended('/wallet');
        }
    }
}
