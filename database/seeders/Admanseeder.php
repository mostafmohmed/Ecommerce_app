<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
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
        $first_role_id = Role::first()->id;
        Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => $first_role_id,
        ]);
        Admin::create([
            'name' => 'ali',
            'email' => 'ali@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => $first_role_id,
        ]);

    }
}
