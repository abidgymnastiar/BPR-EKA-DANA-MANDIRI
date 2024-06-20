<?php

namespace Database\Factories;

use App\Models\JenisJaminanModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PeminjamanModel>
 */
class PeminjamanModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_lengkap' => $this->faker->name(),
            'no_hp' => $this->faker->e164PhoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'provinsi' => $this->faker->state(),
            'kota' => $this->faker->city(),
            'pekerjaan' => $this->faker->randomElement(['PNS', 'Pegawai Swasta', 'Pensiunan PNS', 'Pensiunan Biasa', 'TNI/Polri', 'Wiraswasta atau Pengusaha', 'Tidak Bekerja', 'Lainnya']),
            'id_jaminan' => JenisJaminanModel::all()->random()->id_jaminan,
            'sertifikat_atas_nama' => $this->faker->randomElement(['pemohon/pasangan', 'keluarga']),
            'jumlah_pinjaman' => $this->faker->randomElement(['500 Juta - 1 Miliar', '1 Miliar - 2 Miliar']),
        ];
    }
}
