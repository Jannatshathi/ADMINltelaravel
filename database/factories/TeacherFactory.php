<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->word(3),
            "email" => $this->faker->email,
            "password" => bcrypt('password'),
            "description" => $this->faker->sentence,
        ];
    }
}
