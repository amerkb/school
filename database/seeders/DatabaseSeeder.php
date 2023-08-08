<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Gender;
use App\Models\MyParent;
use App\Models\Specialization;
use App\Models\Student;
use App\Models\SubjectCategory;
use App\Models\Teacher;
use App\Models\Type_Exam;
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
        $this->call(Type_UserSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(Type_examrSeeder::class);
        $this->call(SubjectCategoriesSeeder::class);
        $this->call(teacherSectionSeeder::class);
        $this->call(QuizzesTableSeeder::class);
        $this->call(TimeTableTableSeeder::class);
        $this->call(LibrarySeeder::class);


        Teacher::create([
            'name' => 'Teacher',
            'email' => 'teacher@gamil.com',
            "password"=>bcrypt(12345678),
            "Specialization_id"=>1,
            "Gender_id"=>1,
            "Joining_Date"=>"2023-05-23",
            "Address"=>"midan",
        ]);

        Student::create(["name"=> "ali",
            'email' => "ali@gamil.com",
            'password' => bcrypt(12345678),
            'gender_id' =>1,
            'nationalitie_id' =>1,
            'blood_id' =>1,
            'Date_Birth' =>"2023-9-4",
            'Grade_id' => 1,
            'Classroom_id' => 1,
            'section_id' =>1,
            "parent_id"=>1,
            "academic_year"=>"2023-2024",]);
    }

}
