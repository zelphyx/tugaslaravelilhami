<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NIS' => fake()->unique()->randomNumber(5),
            'Nama' => fake()->name(),
            'id_kelas' => fake()->numberBetween(1,5),
            'tgl_lahir' => fake()->dateTimeBetween('-17 years', '-15 years')->format('Y-m-d'),
            'alamat' => fake() -> address()


        ];
    }
}
