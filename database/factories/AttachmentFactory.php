<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Attachment;
use App\Models\Contract;

class AttachmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attachment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'contract_id' => Contract::factory(),
            'file_path' => fake()->word(),
            'file_name' => fake()->word(),
            'mime_type' => fake()->word(),
            'size' => fake()->numberBetween(-10000, 10000),
        ];
    }
}
