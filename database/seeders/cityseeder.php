<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class cityseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [

            [
                'governreate_id' => 1,
                'name' => [
                    'ar' => 'الإسكندرية',
                    'en' => 'Alexandria',
                ],
            ],
            [
                'governreate_id' => 1,
                'name' => [
                    'ar' => 'برج العرب',
                    'en' => 'Borg El Arab',
                ],
            ],
            [
                'governreate_id' => 1,
                'name' => [
                    'ar' => 'المنتزه',
                    'en' => 'El Montaza',
                ],
            ],

            // Cairo Governorate (ID: 2)
            [
                'governreate_id' => 2,
                'name' => [
                    'ar' => 'مدينة نصر',
                    'en' => 'Nasr City',
                ],
            ],
            [
                'governreate_id' => 2,
                'name' => [
                    'ar' => 'مصر الجديدة',
                    'en' => 'Heliopolis',
                ],
            ],
            [
                'governreate_id' => 2,
                'name' => [
                    'ar' => 'المعادي',
                    'en' => 'Maadi',
                ],
            ],
        ];

        // Seed cities
        foreach ($cities as $city) {
            City::create($city);
        }

    }
}
