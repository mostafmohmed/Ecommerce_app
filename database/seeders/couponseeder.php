<?php

namespace Database\Seeders;

use App\Models\Coupons;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class couponseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coupons::truncate();
        Coupons::factory()->count(20)->create();
    }
}
