<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cgy>
 */
class CgyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return ['title' => $this->faker->realText(20),
            // 'desc' => $this->faker->realText(50),
            'sort' => rand(0, 20),
            // 'enabled' => rand(0, 1),
            //  'enabled_at' => Carbon::createFromFormat('Y-m-d',$this->faker->date),
            'pic' => $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}
