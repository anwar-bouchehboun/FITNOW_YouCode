<?php

namespace Database\Factories;

use App\Models\Progress;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Progress>
 */
class ProgressFactory extends Factory
{

    public function definition()
    {
        return [
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'weight' => $this->faker->randomFloat(2, 50, 150),
            'measurements' => $this->faker->numberBetween(80, 200) . 'x' . $this->faker->numberBetween(50, 120),
            'performance' => $this->faker->randomElement(['Good', 'Average', 'Poor']),
            'status' => 'Non terminé',
        ];
    }
}