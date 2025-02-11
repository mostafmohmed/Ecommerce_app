<?php

namespace Database\Seeders;

use App\Models\Brande;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class brandeseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Brande::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

$brands=[
    ['name'=>['en'=>'Apple','ar'=>'ابل'],'logo'=> 'https://logos-world.net/wp-content/uploads/2020/09/Google-Logo.png'],
    ['name'=>['en'=>'opp','ar'=>'اوبو'],'logo'=> 'https://logos-world.net/wp-content/uploads/2020/09/Google-Logo.png'],
    ['name'=>['en'=>'Google','ar'=>'جوجل'],'logo'=> 'https://logos-world.net/wp-content/uploads/2020/09/Google-Logo.png'],
    ['name'=>['en'=>'Xiaomi','ar'=>'شاومي'],'logo'=> 'https://logos-world.net/wp-content/uploads/2020/09/Google-Logo.png'],
    ['name'=>['en'=>'OnePlus','ar'=>'وان بلس'],'logo'=> 'https://logos-world.net/wp-content/uploads/2020/09/Google-Logo.png'],
    ['name'=>['en'=>'Vivo','ar'=>'فيفو'],'logo'=> 'https://logos-world.net/wp-content/uploads/2020/09/Google-Logo.png'],
    ['name'=>['en'=>'Realme','ar'=>'ريال مي'],'logo'=> 'https://logos-world.net/wp-content/uploads/2020/09/Google-Logo.png'],
    [
        'name' => ['en' => 'Samsung', 'ar' => 'سامسونج'],
        'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/24/Samsung_Logo.png',
    ],
    [
        'name' => ['en' => 'Huawei', 'ar' => 'هواوي'],
        'logo' => 'https://upload.wikimedia.org/wikipedia/commons/e/e0/Huawei_Logo.png',
    ]
]; 
foreach($brands as $brand){
    Brande::create($brand);
}
    }
}
