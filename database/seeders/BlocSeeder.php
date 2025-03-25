<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create 10 blocs and for each bloc call transaction seeder to make 5 transactions
        \App\Models\Bloc::factory(10)->create(
            [
            'miner_id' => \App\Models\User::where('role', 'miner')->get()->random()->id
            ]
        )->each(function ($bloc) {
            \App\Models\Wallet::all()->random(5)->each(function ($wallet, $key) use ($bloc) {
                \App\Models\Transaction::factory()->create([
                    'sender_id' => $wallet->id,
                    'receiver_id' => \App\Models\Wallet::where('id', '!=', $wallet->id)->get()->random()->id,
                    'amount' => random_int(0, 100),
                    'hash' => \Illuminate\Support\Str::random(32),
                    'nonce' => random_int(0, 100),
                    'fee' => random_int(0, 10),
                    'signature' => \Illuminate\Support\Str::random(32),
                    'bloc_position' => $key,
                    'bloc_id' => $bloc->id,
                ]);
            });
        });

    }
}
