<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GCSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $garde1= Grade::create([
            "Name"=>"first_garde",
            "Notes"=>"first_garde",
        ]);

        $classroom1= Classroom::create([
            "Name_Class"=>"first_class",
            "Grade_id"=>$garde1->id,
        ]);
        $classroom2= Classroom::create([
            "Name_Class"=>"second_class",
            "Grade_id"=>$garde1->id,
        ]);

        Section::create([
            "Name_Section"=>"first_section",
            "Status"=>1,
            "Grade_id"=>$garde1->id,
            "Class_id"=>$classroom1->id,
        ]);

        Section::create([
            "Name_Section"=>"second_section",
            "Status"=>1,
            "Grade_id"=>$garde1->id,
            "Class_id"=>$classroom1->id,
        ]);

        Section::create([
            "Name_Section"=>"first_section",
            "Status"=>1,
            "Grade_id"=>$garde1->id,
            "Class_id"=>$classroom2->id,
        ]);
        Section::create([
            "Name_Section"=>"second_section",
            "Status"=>1,
            "Grade_id"=>$garde1->id,
            "Class_id"=>$classroom2->id,
        ]);
        $garde2= Grade::create([
            "Name"=>"second_garde",
            "Notes"=>"second_garde",
        ]);

        $classroom1= Classroom::create([
            "Name_Class"=>"first_class",
            "Grade_id"=>$garde2->id,
        ]);
        $classroom2= Classroom::create([
            "Name_Class"=>"second_class",
            "Grade_id"=>$garde2->id,
        ]);

        Section::create([
            "Name_Section"=>"first_section",
            "Status"=>1,
            "Grade_id"=>$garde2->id,
            "Class_id"=>$classroom1->id,
        ]);

        Section::create([
            "Name_Section"=>"second_section",
            "Status"=>1,
            "Grade_id"=>$garde2->id,
            "Class_id"=>$classroom1->id,
        ]);

        Section::create([
            "Name_Section"=>"first_section",
            "Status"=>1,
            "Grade_id"=>$garde2->id,
            "Class_id"=>$classroom2->id,
        ]);
        Section::create([
            "Name_Section"=>"second_section",
            "Status"=>1,
            "Grade_id"=>$garde2->id,
            "Class_id"=>$classroom2->id,
        ]);
    }
}
