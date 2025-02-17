<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Customer;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'sap_no' => fake()->randomNumber(),
            'name_chs' => fake()->word(),
            'name_eng' => fake()->word(),
            'file_no' => fake()->word(),
            'locate' => fake()->word(),
            'group' => fake()->randomNumber(),
        ];
    }
}
