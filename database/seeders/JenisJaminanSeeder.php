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
            ['nama_jaminan' => 'Sertifikat Tanah dan Bangunan (SHM/SHGB)','author_id' => auth()->user()->id],
            ['nama_jaminan' => 'BPKB Kendaraan Bermotor','author_id' => auth()->user()->id],
            ['nama_jaminan' => 'Sertifikat Tanah','author_id' => auth()->user()->id],
            ['nama_jaminan' => 'BPKB Mobil','author_id' => auth()->user()->id],
            ['nama_jaminan' => 'BPKB Motor','author_id' => auth()->user()->id],
        ];

        foreach ($data as $item) {
            JenisJaminanModel::create($item);
        }
    }
}
