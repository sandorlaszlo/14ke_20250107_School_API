<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $courses = ['09A', '09B', '10A', '10B', '11A', '11B', '14KE'];
        return [
            // 'name' => fake()->randomElement($courses)            
            'name' => fake()->unique()->word()
        ];
    }
}
