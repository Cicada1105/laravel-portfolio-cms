<?php

namespace Database\Factories;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmploymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'employer' => $this->faker->name,
            'description' => $this->faker->sentence,
            'start_month' => strtolower($this->faker->monthName),
            'start_year' => $this->faker->year,
            'end_month' => strtolower($this->faker->monthName),
            'end_year' => $this->faker->year,
            'slug' => $this->faker->slug,
            'user_id' => User::all()->random()
        ];
    }
}
