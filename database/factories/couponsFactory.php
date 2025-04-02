<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\coupons>
 */
class couponsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $limit=$this->faker->numberBetween(10,50);
        $time_used=$this->faker->numberBetween(0,$limit);
        return [
         'code'=>$this->faker->unique()-> regexify('[A-Z0-9]{10}'),
         'discount_perecentage'=>$this->faker->numberBetween(10,50),
         'is_active'=>$this->faker->boolean(60),
         'limit'=> $limit,
         'time_used'=> $time_used,
         'start_data'=>now()->addDay(random_int(1,4) ),
         'end_data'=>now()->addDay(random_int(5,30) ),

        ];
    }
}
