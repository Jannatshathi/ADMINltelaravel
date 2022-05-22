<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use Illuminate\Support\Str;

class StudentFactory extends Factory
{
    protected $mode = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->word();

        return [
            'name' => $name,
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'address' => $this->faker->address(),
        ];
    }
}
