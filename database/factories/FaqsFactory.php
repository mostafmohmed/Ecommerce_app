<?php

namespace Database\Factories;

use App\Models\Faqs;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FaqsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Faqs::class;
    public function definition(): array
    {
        return [
'question'=>[ 'en'=>$this->faker->sentence(5),'ar'=>$this->faker->sentence(5)],
'answer'=>['en'=>$this->faker->sentence(5),'ar'=>$this->faker->sentence(5)],
        ]  ;       
    }
}
