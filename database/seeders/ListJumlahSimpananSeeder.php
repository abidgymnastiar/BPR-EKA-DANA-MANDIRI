<?php

namespace Database\Seeders;

use App\Models\ListJumlahSimpananModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListJumlahSimpananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ListJumlahSimpananModel::factory()->count(10)->create();
    }
}
