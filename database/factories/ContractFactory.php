<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\;
use App\Models\Contract;
use App\Models\Customer;

class ContractFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contract::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'contract_no' => fake()->word(),
            'contract_region' => fake()->word(),
            'contract_date' => fake()->date(),
            'contract_class' => fake()->word(),
            'contract_sales' => fake()->word(),
            'customer_id' => Customer::factory(),
            'contact_id' => ::factory(),
            'contract_amount' => fake()->randomFloat(2, 0, 999999.99),
            'contract_tax_rate' => fake()->randomFloat(2, 0, 999999.99),
            'contract_amount_wtax' => fake()->randomFloat(2, 0, 999999.99),
            'terms_origin' => fake()->text(),
            'terms_delivery' => fake()->text(),
            'terms_place_delivery' => fake()->text(),
            'delivery_estimated' => fake()->numberBetween(-10000, 10000),
            'terms_payment' => fake()->text(),
        ];
    }
}
