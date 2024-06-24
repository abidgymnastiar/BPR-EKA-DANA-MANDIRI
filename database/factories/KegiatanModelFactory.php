<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KegiatanModel>
 */
class KegiatanModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::factory()->create();
        return [
            'nama_kegiatan' => $this->faker->sentence(3),
            'isi' => $this->faker->paragraph(3),
            'tgl_mulai' => $this->faker->dateTimeThisYear(),
            'tgl_selesai' => $this->faker->dateTimeThisYear(),
            'gambar' => $this->faker->imageUrl(),
            'author' => $user->id,
        ];
    }
}
