<?php

namespace Database\Seeders;

use App\Models\Faqs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Fqseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faqs::factory()->count(10)->create();
    }
}
