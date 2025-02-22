<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RefferalCode>
 */
class RefferalCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'offer_id' => rand(1, 5),
            'active' => $this->faker->boolean(80),
            'user_id' => rand(1, 20)
        ];
    }
}
