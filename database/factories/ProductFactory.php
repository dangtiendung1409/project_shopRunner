<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name;
        return [
            "name" => $name,
            "slug" => Str::slug($name),
            "color" => $this->faker->colorName,
//            "size" => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            "price" => random_int(100,1000),
            "thumbnail" => "/img/product/product-".random_int(1,12).".jpg",
            "qty" => random_int(2,50),
            "status" => $this->faker->randomElement([0, 1]),
            "description" => $this->faker->text(700),
            "category_id" => random_int(1,10)
        ];
    }
}
