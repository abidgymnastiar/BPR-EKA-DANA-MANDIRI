<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KegiatanKegiatanKategoriModel>
 */
class KegiatanKegiatanKategoriModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kegiatan_id' => $this->faker->randomDigitNot(0),
            'kegiatan_kategori_id' => $this->faker->randomDigitNot(0),
        ];
    }
}
