<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ListJumlahSimpananModel>
 */
class ListJumlahSimpananModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::all()->random() ?? User::factory()->create();
        return [
            'jumlah_simpanan' => $this->faker->randomNumber(5),
            'author_id' => $user->id,
        ];
    }
}
