<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\id_ID\Restaurant($faker));
        return [
            'nm_barang' => $faker->vegetableName(),
            'stok_awal' => fake()->randomNumber(3, true),
            'stok_terbaru' => fake()->randomNumber(3, true),
            'deskripsi' => fake()->sentence(),
            'harga' => fake()->randomFloat(2,10000,100000),
            'ditambahkan_pada' => now(),
            'diubah_pada' => now(),
        ];
    }
    
    /**
     * Indicate that the model's email address should be unverified.
     */
    // public function unverified(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'ditambahkan_pada' => null,
    //         'diubah_pada' => null,
    //     ]);
    // }
}
