<?php

namespace App\Livewire;

use Livewire\Component;

class WalletDisplayer extends Component
{
    public $wallet;
    public $transactions;
    public $page = 0;
    public $numberOfTransactionsByPage = 3;
    public $amount;
    public $address;
    public $successTransaction = false;

    public function mount($wallet)
    {
        $this->wallet = $wallet;
        // 10 first transactions
        $this->transactions = $wallet->transactions->take($this->numberOfTransactionsByPage);
    }

    public function reloadTransactions()
    {
        $this->transactions = $this->wallet->transactions->skip($this->page * $this->numberOfTransactionsByPage)->take($this->numberOfTransactionsByPage);
    }

    public function nextPage()
    {
        $this->page++;
        $this->reloadTransactions();
    }

    public function previousPage()
    {
        $this->page--;
        $this->reloadTransactions();
    }

    public function goToPage($change)
    {
        $this->page += $change;
        if ($change == 0) {
            $this->page = 0;
        }
        $this->reloadTransactions();
    }

    public function sendMoney()
    {
        $this->validate([
            'amount' => 'required|numeric|min:0.01',
            'address' => 'required|exists:wallet,address',
        ]);
        $this->wallet->sendMoneyToOtherWallet($this->address, $this->amount);
        $this->reloadTransactions();
        // display success message
        $this->successTransaction = true;
    }

    public function render()
    {
        return view('livewire.wallet-displayer');
    }
}
