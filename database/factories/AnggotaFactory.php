<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anggota>
 */
class AnggotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement(['Pria', 'Wanita']);
        $status = fake()->randomElement(['Menikah', 'Lajang']);
        return [
            'id_anggota' => fake()->numerify(),
            'nama' => fake()->name(),
            'jenis_kelamin' => $gender,
            'alamat' => fake()->streetAddress(),
            'status' => $status
        ];
    }
}
