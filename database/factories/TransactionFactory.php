<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomFloat(2, 1, 1000),
            'sender_id' => 1,
            'receiver_id' => 2,
            'hash' => $this->faker->sha256,
            'nonce' => $this->faker->randomNumber(5),
            'fee' => $this->faker->randomFloat(2, 0, 10),
            'signature' => $this->faker->sha256,
            'bloc_position' => null,
            'bloc_id' => null
        ];
    }
}
