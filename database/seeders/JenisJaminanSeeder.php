<?php

namespace Database\Seeders;

use App\Models\JenisJaminanModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisJaminanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_jaminan' => 'Sertifikat Tanah dan Bangunan (SHM/SHGB)',],
            ['nama_jaminan' => 'BPKB Kendaraan Bermotor',],
            ['nama_jaminan' => 'Sertifikat Tanah',],
            ['nama_jaminan' => 'BPKB Mobil',],
            ['nama_jaminan' => 'BPKB Motor',],
        ];

        foreach ($data as $item) {
            JenisJaminanModel::create($item);
        }
    }
}
