<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create transaction bettewen 10 wallet among them
        \App\Models\Wallet::all()->random(10)->each(function ($wallet) {
            \App\Models\Transaction::factory()->create([
                'sender_id' => $wallet->id,
                'receiver_id' => \App\Models\Wallet::where('id', '!=', $wallet->id)->get()->random()->id,
                'amount' => random_int(0, 100),
                'hash' => \Illuminate\Support\Str::random(32),
                'nonce' => random_int(0, 100),
                'fee' => random_int(0, 10),
                'signature' => \Illuminate\Support\Str::random(32),
                'bloc_position' => random_int(0, 100),
            ]);
        });

    }
}
