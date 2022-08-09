<?php

namespace Database\Factories;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'institution_name' => $this->faker->sentence(3),
            'degree_type' => $this->faker->randomElement(['Undergraduate','Masters','Post Graduate Certificate','Doctorate']),
            'degree' => $this->faker->sentence,
            'start_month' => strtolower($this->faker->monthName),
            'start_year' => $this->faker->year,
            'end_month' => strtolower($this->faker->monthName),
            'end_year' => $this->faker->year,
            'slug' => $this->faker->slug,
            'user_id' => User::all()->random()
        ];
    }
}
