<?php

namespace App\Livewire;

use Livewire\Component;

class LoginPage extends Component
{
    public function render()
    {
        return view('livewire.login-page');
    }

    public function login()
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
