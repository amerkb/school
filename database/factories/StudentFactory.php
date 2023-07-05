<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Student>
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
            "name"=> $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt(12345678),
            'gender_id' =>$this->faker->numberBetween(1,2),
            'nationalitie_id' =>$this->faker->numberBetween(1,11),
            'blood_id' =>$this->faker->numberBetween(1,4),
            'Date_Birth' => $this->faker->date(),
            'Grade_id' => $this->faker->numberBetween(1,2),
            'Classroom_id' => $this->faker->numberBetween(1,4),
            'section_id' =>$this->faker->numberBetween(1,8),
            "parent_id"=>$this->faker->numberBetween(1,10),
            "academic_year"=>"2023-2024",



        ];
    }
}
