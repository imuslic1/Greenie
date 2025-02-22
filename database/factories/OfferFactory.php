<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => rand(10, 50),
            'discount_percentage' => 5 * rand(1, 10),
            'partner_id' => rand(1, 10),
            'active' => $this->faker->boolean(80)
        ];
    }
}
