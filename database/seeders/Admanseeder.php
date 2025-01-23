<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Admanseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Admin::create([
        'name'=>'admin',
        'password'=>Hash::make('password'),
        'email'=>'admin@sgmail.com',
       
       ]);
    }
}
