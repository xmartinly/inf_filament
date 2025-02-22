<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'pn' => fake()->word(),
            'price' => fake()->randomFloat(4, 0, 999999999999.9999),
            'year' => fake()->randomNumber(),
            'class' => fake()->word(),
            'description' => fake()->text(),
        ];
    }
}
