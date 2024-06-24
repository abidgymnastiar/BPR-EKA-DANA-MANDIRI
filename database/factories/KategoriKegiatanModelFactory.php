<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KategoriKegiatanModel>
 */
class KategoriKegiatanModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $icon = [
            'fas fa-award',
            'fas fa-balance-scale',
            'fas fa-balance-scale-right',
            'fas fa-balance-scale-left',
            'fas fa-balance-scale',
        ];
        return [
            'nama_kategori' => $this->faker->sentence(3),
            'keterangan' => $this->faker->paragraph(1),
            'color_label' => $this->faker->hexColor,
            'icon' => $icon[array_rand($icon)], // fontawesome icon
        ];
    }
}
