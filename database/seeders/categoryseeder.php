<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name'=>['en'=>'elctronics' , 'ar'=>'الكترونيات'],
                'status'=>1,
                'parent'=>null,
            ],
            [
                'name'=>['en'=>'category2' , 'ar'=>'التصنيف الثاني'],
                'status'=>1,
                'parent'=>null,
            ],
            [
                'name'=>['en'=>'category3' , 'ar'=>'التصنيف الثالث'],
                'status'=>1,
                'parent'=>null,
            ],
            [
                'name'=>['en'=>'category4' , 'ar'=>'التصنيف الرابع'],
                'status'=>1,
                'parent'=>null,
            ],
        ];

        foreach($data as $cat){
            Category::create($cat);
        }

    }
}
