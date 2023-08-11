<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            "password"=>bcrypt(12345678),
            "Specialization_id"=>$this->faker->numberBetween(1,4),
            "Gender_id"=> $this->faker->numberBetween(1,2),
            "Joining_Date"=>$this->faker->date(),
            "Address"=>$this->faker->address(),
            "phone"=>$this->faker->phoneNumber(),
        ];
    }
}
