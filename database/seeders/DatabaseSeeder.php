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
    }
}
