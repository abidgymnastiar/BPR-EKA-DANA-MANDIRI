<?php

namespace Database\Factories;

use App\Models\KategoriProdukModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProdukModel>
 */
class ProdukModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_produk' => $this->faker->word,
            'deskripsi' => $this->faker->sentence,
            'harga' => $this->faker->randomNumber(5),
            'stok' => $this->faker->randomNumber(2),
            'kategori_id' => KategoriProdukModel::factory()->create()->id,
            'author' => User::factory()->create()->id,
            'gambar' => 'foto-cover.jpg',
        ];
    }
}
