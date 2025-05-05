<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kk>
 */
class KkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pendaftar = Pendaftar::inRandomOrder()->first() ?? Pendaftar::factory()->create();

        return [
            'pendaftar_id' => $pendaftar->id,
            'nik' => $pendaftar->nik,
            'no_kk' => $this->faker->unique()->numerify('################'),
            'nama_kepala_keluarga' => $pendaftar->nama,
            'alamat' => $pendaftar->alamat,
            'tanggal_cetak' => now(),
        ];
    }
}