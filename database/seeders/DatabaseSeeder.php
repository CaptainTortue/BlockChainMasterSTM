<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // create users, for each user create a wallet
        \App\Models\User::factory(10)->create()->each(function ($user) {
            \App\Models\Wallet::factory()->create([
                'balance' => random_int(0, 1000),
                'user_id' => $user->id,
            ]);
        });

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
