<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $table = 'wallet';

    protected $fillable = [
        'id',
        'created_at',
        'updated_at',
        'user_id',
        'balance',
        'name',
        'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'receiver_id');
    }

    public function sendMoneyToOtherWallet($address, $amount)
    {
        // create transaction
        $transaction = new Transaction();
        $transaction->sender_id = $this->id;
        $transaction->receiver_id = Wallet::where('address', $address)->first()->id;
        $transaction->amount = $amount;
        $transaction->save();
        $this->refresh();
    }
}
