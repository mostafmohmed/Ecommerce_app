<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            roleseeder::class,
            Admanseeder::class,
            countryseeder::class,
            Govermoertseeder::class,
            cityseeder::class,
            categoryseeder::class,
            brandeseeder::class,
            couponseeder::class,
            Attributeseeder::class
           
        ]);

        
    }
}
