<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class sliderseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::create([
            'file_name'=>'slider2.webp',
            'notes'=>'gsssssgggggggggggggggggggggggggggggggggggggggggggggggg'
        ]);
        Slider::create([
            'file_name'=>'slider1.webp',
               'notes'=>'gsssssgggggggggggggggggggggggggggggggggggggggggggggggg'
        ]);
        Slider::create([
            'file_name'=>'slider3.webp',
               'notes'=>'gsssssgggggggggggggggggggggggggggggggggggggggggggggggg'
        ]);
    }
}
