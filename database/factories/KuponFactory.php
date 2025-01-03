<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kupon>
 */
class KuponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kode' => $this->faker->unique()->regexify('[A-Z0-9]{8}'),
            'diskon' => $this->faker->numberBetween(5, 50), // Diskon antara 5% hingga 50%
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
