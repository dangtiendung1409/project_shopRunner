<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name  = $this->faker->unique()->colorName;
        $tag  = $this->faker->unique()->name;

        return [
            "name" => $name,
            "slug" => Str::slug($name),
            "color" => $this->faker->colorName,
            "price" => random_int(100,1000),
            "tags" => $tag,
            "size" => $this->faker->randomElement(['XS','S', 'M', 'L', 'XL','2XL','3XL']), // Generate a random size
        ];
    }
}
