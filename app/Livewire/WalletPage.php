<?php

namespace App\Livewire;

use App\Models\Wallet;
use Livewire\Component;

class WalletPage extends Component
{

    public $wallets;
    public $nameNewWallet;

    public function mount()
    {
        if (!auth()->check()) {
            return redirect()->to('/login');
        }
        $this->wallets = auth()->user()->wallets;
    }

    public function createWallet()
    {
        $this->validate([
            'nameNewWallet' => 'required|min:3|max:255',
        ]);
        $newWallet = Wallet::create([
            'name' => $this->nameNewWallet,
            'balance' => 0,
            'address' => '0x' . bin2hex(random_bytes(20)),
            'user_id' => auth()->id(),
        ]);
        $this->wallets->push($newWallet);
    }

    public function mineBlock()
    {
        // go to mempool
        return redirect()->to('/mempool');
    }

    public function render()
    {
        return view('livewire.wallet-page');
    }
}
