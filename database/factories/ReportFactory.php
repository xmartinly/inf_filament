<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Report;

class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Report::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'engineer_name' => fake()->word(),
            'job_region' => fake()->word(),
            'cst_sap_no' => fake()->randomNumber(),
            'cst_name_chs' => fake()->word(),
            'cst_name_eng' => fake()->word(),
            'product_model' => fake()->word(),
            'product_class' => fake()->word(),
            'product_errcode' => fake()->regexify('[A-Za-z0-9]{500}'),
            'product_catsn' => fake()->regexify('[A-Za-z0-9]{500}'),
            'job_content' => fake()->text(),
            'job_notes' => fake()->regexify('[A-Za-z0-9]{500}'),
            'in_date' => fake()->date(),
            'done_date' => fake()->date(),
            'is_done' => fake()->boolean(),
            'service_type' => fake()->word(),
            'spare_usage' => '{}',
            'customer_id' => fake()->randomNumber(),
            'product_id' => fake()->randomNumber(),
            'product_model_id' => fake()->randomNumber(),
        ];
    }
}
