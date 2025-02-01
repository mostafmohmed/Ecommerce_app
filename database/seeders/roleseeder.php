<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permessions = [];
        foreach(config('permessions_en') as $permession=>$value){
            $permessions[] = $permession;
        }

        Role::create([
            'role'=>[
                'ar'=>'مدير',
                'en'=>'Manger',
            ],
            'permession'=>json_encode($permessions),
        ]);
    }

    }

