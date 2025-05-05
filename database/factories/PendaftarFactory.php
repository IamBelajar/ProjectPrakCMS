<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pendaftar>
 */
class PendaftarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'nik' => $this->faker->unique()->numerify('3210##############'),
            'alamat' => $this->faker->address(),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date('Y-m-d', '-18 years'),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
            'pekerjaan' => $this->faker->jobTitle(),
        ];
    }
}