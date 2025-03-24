<?php

namespace Database\Factories;

use App\Models\Bloc;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bloc>
 */
class BlocFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hash' => $this->faker->sha256,
            // get hash from last bloc
            'previous_hash' => Bloc::all()->count() > 0 ? Bloc::all()->last()->hash : 0,
            'merkle_root' => $this->faker->sha256,
            'difficulty' => $this->faker->randomNumber(5),
            'value_on_creation' => $this->faker->randomFloat(2, 1, 1000),
            'reward' => $this->faker->randomFloat(2, 0, 10),
            'miner_id' => 1,
            'value_created' => $this->faker->randomFloat(2, 1, 1000)
        ];
    }
}
