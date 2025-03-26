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
            'hash' => \Illuminate\Support\Str::random(32),
            'difficulty' => 1
        ]);
        $merkleRoot = '';
        // Add transactions to the block
        $blocPosition = 2;
        foreach ($this->transactionsForBlock as $transaction) {
            $transaction->bloc_id = $bloc->id;
            $transaction->bloc_position = $blocPosition;
            $transaction->save();
            $merkleRoot .= $transaction->hash;
            $blocPosition++;
        }
        $bloc->save();
        // add transaction reward to the merkle root and to the bloc
        $rewardTransaction = Transaction::create([
            'sender_id' => null,
            'receiver_id' => auth()->user()->wallets->first()->id,
            'amount' => $this->totalAmount * 0.01,
            'hash' => \Illuminate\Support\Str::random(32),
            'nonce' => random_int(0, 100),
            'fee' => 0,
            'signature' => \Illuminate\Support\Str::random(32),
            'bloc_position' => 1,
            'bloc_id' => $bloc->id,
        ]);
        $merkleRoot .= $rewardTransaction->hash;
        // hash the merkle root
        $merkleRoot = hash('sha256', $merkleRoot);
        $bloc->merkle_root = $merkleRoot;
        $bloc->save();
        $this->transactionsForBlock = [];
        $this->totalFee = 0;
        $this->totalAmount = 0;
        // remove transactions from list
        $this->mempoolTransactions = Transaction::where('bloc_id', null)->orderBy('fee', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.mempool-page');
    }
}
