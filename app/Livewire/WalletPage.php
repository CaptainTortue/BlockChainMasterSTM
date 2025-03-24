<?php

namespace App\Livewire;

use Livewire\Component;

class WalletPage extends Component
{

    public $wallets;

    public function mount()
    {
        if (!auth()->check()) {
            return redirect()->to('/login');
        }
        $this->wallets = auth()->user()->wallets;
    }

    public function render()
    {
        return view('livewire.wallet-page');
    }
}
