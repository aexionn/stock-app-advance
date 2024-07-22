<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gudang>
 */
class GudangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nm_tempat' => 'gd-'.fake()->streetName(),
            'lokasi' => fake()->address(),
            'nm_supervisor' => fake()->name(),
            'kapasitas' => fake()->randomNumber(5, true)
        ];
    }
}
