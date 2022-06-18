<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RealEstate>
 */
class RealEstateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(128),
            'real_state_type' => $this->faker->randomElement([
                "house",
                "department",
                "land",
                "commercial_ground"
            ]),
            'street' => $this->faker->text(128),
            'external_number' => $this->faker->text(12),
            'internal_number' => $this->faker->text(12),
            'neighborhood' => $this->faker->text(128),
            'city' => $this->faker->text(64),
            'country' => $this->faker->randomElement([
                "MX",
                "US",
                "JP"
            ]),
            'rooms' => $this->faker->numberBetween(1,30),
            'bathrooms' => $this->faker->numberBetween(1,30),
            'comments' => $this->faker->text(128),
        ];
    }
}
