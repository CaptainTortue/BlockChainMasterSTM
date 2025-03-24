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

    public function receiver()
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
}
