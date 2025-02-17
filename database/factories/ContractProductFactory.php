<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ContractProduct;

class ContractProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContractProduct::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'contract_id' => fake()->word(),
            'product_id' => fake()->word(),
            'quantity' => fake()->numberBetween(-10000, 10000),
            'discount_rate' => fake()->randomFloat(2, 0, 999999.99),
            'amount' => fake()->randomFloat(2, 0, 999999.99),
        ];
    }
}
