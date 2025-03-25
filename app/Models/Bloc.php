<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloc extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hash',
        'previous_hash',
        'merkle_root',
        'nonce',
        'difficulty',
        'reward',
        'miner_id',
        'created_at',
        'updated_at',
        'value_created',
    ];

    public function setToValidate()
    {
        // get last bloc with previous hash not null, or last bloc if no previous hash
        $previousBloc = Bloc::whereNotNull('previous_hash')->latest()->first();
        if (!$previousBloc) {
            $previousBloc = Bloc::latest()->first();
        }
        $this->previous_hash = $previousBloc->hash;
        $this->save();
    }

    public function miner()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
