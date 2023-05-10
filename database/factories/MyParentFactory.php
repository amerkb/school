<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=MyParent>
 */
class MyParentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt(12345678),
            'Name_Father' => $this->faker->name(),
            "Phone_Father"=>$this->faker->unique()->phoneNumber(),
            "National_ID_Father"=>$this->faker->unique()->numberBetween("1000000000","9999999999"),
            "Passport_ID_Father"=>$this->faker->unique()->numberBetween("1000000000","9999999999"),
            "Job_Father"=>$this->faker->jobTitle(),
            "Nationality_Father_id"=>2,
            "Blood_Type_Father_id"=>1,
            "Religion_Father_id"=>2,
            "Address_Father"=>$this->faker->address(),
            'Name_Mother' => $this->faker->name(),
            "Phone_Mother"=>$this->faker->unique()->phoneNumber(),
            "National_ID_Mother"=>$this->faker->unique()->numberBetween("1000000000","9999999999"),
            "Passport_ID_Mother"=>$this->faker->unique()->numberBetween("1000000000","9999999999"),
            "Job_Mother"=>$this->faker->jobTitle(),
            "Nationality_Mother_id"=>2,
            "Blood_Type_Mother_id"=>1,
            "Religion_Mother_id"=>2,
            "Address_Mother"=>$this->faker->address(),
        ];
    }


}
