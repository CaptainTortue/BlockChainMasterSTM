<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'created_at',
        'updated_at',
        'sender_id',
        'receiver_id',
        'amount',
        'hash',
        'nonce',
        'fee',
        'signature'
    ];

    public function sender()
    {
        return $this->belongsTo(Wallet::class, 'sender_id');
    }

    public function recipient()
    {
        return $this->belongsTo(Wallet::class, 'receiver_id');
    }

    public function bloc()
    {
        return $this->belongsTo(Blocs::class, 'bloc_id');
    }

    public function isInMempool()
    {
        return $this->bloc_id == null;
    }

    // set parameters for transaction on save
    public static function boot()
    {
        parent::boot();
        static::creating(function ($transaction) {
            // fee is 0.1% of the transaction amount, rounded to 2 decimal places
            $transaction->fee = round($transaction->amount * 0.001, 2);
            $transaction->hash = hash('sha256', $transaction->sender_id . $transaction->receiver_id . $transaction->amount . $transaction->nonce . $transaction->fee);
            // update wallet balance of sender and receiver
            if ($transaction->sender_id) {
                $transaction->sender->balance -= $transaction->amount + $transaction->fee;
            }
            $transaction->recipient->balance += $transaction->amount;
            $transaction->recipient->save();
        });
    }
}
