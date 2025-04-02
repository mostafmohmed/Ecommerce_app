<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Attributeseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $size_attribute = Attribute::create([
            'name' => [
                'en' => 'Size',
                'ar' => 'الحجم',
            ],
        ]);
        $size_attribute->attributrvalues()->createMany([
            [
                'value' => [
                    'en' => 'Small',
                    'ar' => 'صغير',
                ],
            ],
            [
                'value' =>[
                    'en' => 'Medium',
                    'ar' => 'متوسط',
                ],
            ],
            [
                'value' => [
                    'en' => 'Large',
                    'ar' => 'كبير',
                ],
            ],
        ]);

      

        $color_attribute = Attribute::create([
            'name' => [
                'en' => 'color',
                'ar' => 'اللون',
            ],
        ]);
        $color_attribute->attributrvalues()->createMany([
            [
                'value' => [
                    'en' => 'Red',
                    'ar' => 'أحمر',
                ],
            ],
            [
                'value' => [
                    'en' => 'Blue',
                    'ar' => 'أزرق',
                ],
            ],
            [
                'value' => [
                    'en' => 'Green',
                    'ar' => 'أخضر',
                ],
            ],
            [
                'value' =>[
                    'en' => 'Black',
                    'ar' => 'أسود',
                ],
            ],
            [
                'value' =>[
                    'en' => 'White',
                    'ar' => 'أبيض',
                ],
            ]

        ]);

    }
}
