<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->word,
            'slug' => $this->faker->word,
            'images' => $this->faker->url,
            'description' => $this->faker->sentence,
            'code' => $this->faker->unique()->numerify('PROD-#####'),
            'price' => $this->faker->numberBetween(10000, 99999),
            'cost' => $this->faker->numberBetween(10000, 99999),
            'quantity' => $this->faker->numberBetween(10000, 99999),
            'stock' => $this->faker->numberBetween(10000, 99999),
        ];
    }
}
