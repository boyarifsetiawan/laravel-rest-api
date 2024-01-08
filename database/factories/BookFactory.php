<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_buku' => fake()->numerify(),
            'judul_buku' => fake()->title(),
            'kategori' => fake()->jobTitle(),
            'pengarang' => fake()->company(),
            'penerbit' => fake()->name(),
        ];
    }
}
