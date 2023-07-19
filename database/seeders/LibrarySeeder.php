<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Library;
use App\Models\Question;
use App\Models\Question_libraries;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Library::create([
            "title"=>"ali",
            "year"=>"2023-2024",
            "file_name"=>"2018-2019-2 (2).pdf",
            "Grade_id"=>1,
            "Classroom_id"=>1,
            "subject_id"=>1
        ]);
        Book::create([
            "title"=>"amer",
            "file_name"=>"DB 1 - دورة فصل ثاني ٢٠٢١-٢٠٢٢.pdf",
            "subject_category_id"=>2,
        ]);
        Book::create([
            "title"=>"ali",
            "file_name"=>"2016-2017-2.pdf",
            "subject_category_id"=>4,
        ]);
        Question_libraries::create([
            "title"=>"ali",
            "quizze_id"=>2,
            "file_name"=>"Theoretical-Data Base-lec-5 .pdf",
            "grade_id"=>1,
            "Classroom_id"=>1,
            "quizzes_subject_id"=>1
        ]);


    }
}
