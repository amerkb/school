<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Gender;
use App\Models\MyParent;
use App\Models\Specialization;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(NationalitiesTableSeeder::class );
        $this->call(BloodTableSeeder::class);
        $this->call(religionTableSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(DaySeeder::class);
        $this->call(TimeSloteSeeder::class);
        $this->call(SpecializationSeeder::class);
        $this->call(GCSSeeder::class);
        $this->call(ParentSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(SettingsTableSeeder::class);


        Teacher::create([
            'name' => 'Teacher',
            'email' => 'teacher@gamil.com',
            "password"=>bcrypt(12345678),
            "Specialization_id"=>1,
            "Gender_id"=>1,
            "Joining_Date"=>"2023-05-23",
            "Address"=>"midan",
        ]);
    }
}
