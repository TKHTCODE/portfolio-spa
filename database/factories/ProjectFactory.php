<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $colorName = $this->faker->randomElement(Project::getAvailableTextColors());
        $iconName = $this->faker->randomElement(Project::getAvailableIcons());

        return [
            'title' => $this->faker->unique()->word(2, true),
            'description' => $this->faker->sentence(),
            'color' =>  $colorName,
            'icon_name' =>  $iconName,
        ];
    }
}
