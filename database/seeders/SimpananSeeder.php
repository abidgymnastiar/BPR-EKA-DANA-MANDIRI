<?php

namespace Database\Seeders;

use App\Models\SimpananModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SimpananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SimpananModel::factory()->count(10)->create();
    }
}
