<?php

namespace Database\Seeders;

use App\Models\ListJumlahSimpananModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListJumlahPeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'author_id' => auth()->user()->id,
                'jumlah_simpanan' => "1000000"
            ],
            [
                'author_id' => auth()->user()->id,
                'jumlah_simpanan' => "2000000"
            ],
            [
                'author_id' => auth()->user()->id,
                'jumlah_simpanan' => "3000000"
            ],
            [
                'author_id' => auth()->user()->id,
                'jumlah_simpanan' => "4000000"
            ],
            [
                'author_id' => auth()->user()->id,
                'jumlah_simpanan' => "5000000"
            ],
        ];

        foreach ($data as $item) {
            ListJumlahSimpananModel::create($item);
        }
    }
}
