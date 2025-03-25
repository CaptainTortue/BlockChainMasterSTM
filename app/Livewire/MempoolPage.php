<?php

namespace App\Livewire;

use App\Models\Bloc;
use App\Models\Transaction;
use Livewire\Component;

class MempoolPage extends Component
{
    public $mempoolTransactions;
    public $transactionsForBlock = [];
    public $totalFee = 0;
    public $totalAmount = 0;

    public function mount()
    {
        if (!auth()->check()) {
            return redirect()->to('/login');
        }
        $this->mempoolTransactions = Transaction::where('bloc_id', null)->orderBy('fee', 'desc')->get();
    }

    public function addTransactionToBloc($transactionId)
    {
        if (count($this->transactionsForBlock) >= 5) {
            return;
        }
        $transaction = Transaction::find($transactionId);
        $this->transactionsForBlock[] = $transaction;
        $this->totalFee += $transaction->fee;
        $this->totalAmount += $transaction->amount;
    }

    public function removeTransactionFromBloc($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        $this->transactionsForBlock = array_filter($this->transactionsForBlock, function ($t) use ($transaction) {
            return $t->id !== $transaction->id;
        });
        $this->totalFee -= $transaction->fee;
        $this->totalAmount -= $transaction->amount;
    }

    public function confirmBlock()
    {
        $this->validate([
            'transactionsForBlock' => 'required',
        ]);
        // Create a new block
        $bloc = Bloc::create([
            'miner_id' => auth()->id(),
            'reward' => $this->totalFee,
            'previous_hash' => Bloc::latest()->first()->hash ?? null,
        ]);
        // Add transactions to the block
        $blocPosition = 0;
        foreach ($this->transactionsForBlock as $transaction) {
            $transaction->bloc_id = $bloc->id;
            $transaction->bloc_position = $blocPosition;
            $transaction->save();
            $blocPosition++;
        }
        $this->transactionsForBlock = [];
        $this->totalFee = 0;
        $this->totalAmount = 0;
    }

    public function render()
    {
        return view('livewire.mempool-page');
    }
}
