<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" =>random_int(1, 10),
            "product_id" =>random_int(1, 10),
            "rating" =>random_int(1, 5),
            "message" => $this->faker->text,
//            "status" => $this->faker->ti
        ];
    }
}
