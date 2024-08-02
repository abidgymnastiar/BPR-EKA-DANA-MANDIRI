<?php

namespace Database\Factories;

use App\Models\ListJumlahSimpananModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SimpananModel>
 */
class SimpananModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $list = ListJumlahSimpananModel::all()->random() ?? ListJumlahSimpananModel::factory()->create();
        return [
            'nama_lengkap' => $this->faker->name(),
            'no_hp' => $this->faker->e164PhoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'provinsi' => $this->faker->state(),
            'kota' => $this->faker->city(),
            'id_jumlah_simpanan' => $list->id,
        ];
    }
}
