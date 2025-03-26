<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Wallet;
use Livewire\Component;

class RegisterPage extends Component
{
    public $username;
    public $login;
    public $email;
    public $password;
    public $password_confirmation;

    public function render()
    {
        return view('livewire.register-page');
    }

    public function createUser()
    {
        $this->validate([
            'username' => 'required',
            'login' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required'
        ]);

        $user = User::create(
            [
                'name' => $this->username,
                'login' => $this->login,
                'email' => $this->email,
                'password' => bcrypt($this->password)
            ]
        );

        auth()->login($user);

        // create a wallet for the user

        Wallet::create([
            'name' => 'Premier Portefeuille',
            'address' => \Illuminate\Support\Str::random(32),
            'balance' => 1000,
            'user_id' => $user->id
        ]);

        return redirect()->to('/wallet');
    }
}
