<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'matric_id' => $this ->faker->unique()->numerify('####'),
            'first_name' =>$this ->faker->firstName,
            'last_name' =>$this ->faker->lastName,
            'email' =>$this ->faker->unique()->safeEmail,
            'phone_no' =>'01'. $this ->faker->numberBetween(10000000,99999999),
            //
        ];
    }
}
