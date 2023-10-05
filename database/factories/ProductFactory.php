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
<<<<<<< HEAD
            "thumbnail"=>"/customer/img/product/product-".random_int(1,45).".jpg",
=======
            "thumbnail" => "/customer/img/product/product".random_int(1,45).".jpg",
>>>>>>> b7ef43235d820e403a57825078bc5c6593630417
            "qty" => random_int(2,50),
//            "status" => $this->faker->randomElement([0, 1]),
            "description" => $this->faker->text(700),
            "category_id" => random_int(1,10)
        ];
    }
}
