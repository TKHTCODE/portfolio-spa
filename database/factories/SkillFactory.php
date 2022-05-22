<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Skill;

class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $color = $this->faker->randomElement(Skill::getAvailableBackgroundColors());
        return [
            'name' => $this->faker->unique()->word(),
            'color' =>  $color,
        ];
    }
}
