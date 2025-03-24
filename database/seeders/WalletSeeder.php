<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create wallet and asign to 10 user among them
        \App\Models\User::all()->random(10)->each(function ($user) {
            \App\Models\Wallet::factory()->create([
                'balance' => random_int(0, 1000),
                'user_id' => $user->id,
            ]);
        });


    }
}
