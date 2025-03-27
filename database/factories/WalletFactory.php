<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wallet>
 */
class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'balance' => 0,
            'name' => $this->faker->name(),
            'address' => $this->faker->numerify('##########'),
            // user_id in parameter, or one of the user_id from the database
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
