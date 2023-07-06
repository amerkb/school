<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizzesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('quizzes')->insert([
            [
                'type_exam_id' => 1,
                'semester' => 1,
                'name' => 'Quiz 1',
                'year' => '2023-2024',
            ],
            [
                'type_exam_id' => 2,
                'semester' => 1,
                'name' => 'Midterm Exam',
                'year' => '2023-2024',
            ],
            [
                'type_exam_id' => 1,
                'semester' => 2,
                'name' => 'Quiz 2',
                'year' => '2023-2024',
            ],
            [
                'type_exam_id' => 2,
                'semester' => 2,
                'name' => 'Final Exam',
                'year' => '2023-2024',
            ],
            [
                'type_exam_id' => 1,
                'semester' => 1,
                'name' => 'Quiz 3',
                'year' => '2023-2024',
            ],
            [
                'type_exam_id' => 2,
                'semester' => 1,
                'name' => 'Midterm Exam 2',
                'year' => '2023-2024',
            ],
            [
                'type_exam_id' => 1,
                'semester' => 2,
                'name' => 'Quiz 4',
                'year' => '2023-2024',
            ],
            [
                'type_exam_id' => 2,
                'semester' => 2,
                'name' => 'Final Exam 2',
                'year' => '2023-2024',
            ],
            [
                'type_exam_id' => 1,
                'semester' => 1,
                'name' => 'Quiz 5',
                'year' => '2023-2024',
            ],
            [
                'type_exam_id' => 2,
                'semester' => 1,
                'name' => 'Midterm Exam 3',
                'year' => '2023-2024',
            ],
            [
                'type_exam_id' => 1,
                'semester' => 2,
                'name' => 'Quiz 6',
                'year' => '2023-2024',
            ],
            [
                'type_exam_id' => 2,
                'semester' => 2,
                'name' => 'Final Exam 3',
                'year' => '2023-2024',
            ],
            [
                'type_exam_id' => 1,
                'semester' => 1,
                'name' => 'Quiz 7',
                'year' => '2023-2024',
            ],
            [
                'type_exam_id' => 2,
                'semester' => 1,
                'name' => 'Midterm Exam 4',
                'year' => '2023-2024',
            ],
            [
                'type_exam_id' => 1,
                'semester' => 2,
                'name' => 'Quiz 8',
                'year' => '2023-2024',
            ],
        ]);


        for ($i = 0; $i < 250; $i++) {
            $subjectId = mt_rand(1, 14);
            $gradeId = mt_rand(1, 2);
            $classroomId = mt_rand(1, 4);
            $sectionId = mt_rand(1, 8);
            $date = date('Y-m-d', strtotime('+'.mt_rand(0, 30).' days'));
            $tsId = mt_rand(1, 5);

            DB::table('quizzes_subject')->insert([
                "quizze_id"=>$subjectId,
                'subject_id' => $subjectId,
                'grade_id' => $gradeId,
                'classroom_id' => $classroomId,
                'date' => $date,
                'ts_id' => $tsId,
            ]);
        }

        $statuses = ['successful', 'fail'];

        for ($i = 0; $i < 215; $i++) {
            $studentId = mt_rand(1, 15);

            for ($j = 0; $j < 10; $j++) {
                $quizzesSubjectId = mt_rand(1, 250);
                $degree = mt_rand(0, 100);
                $status = $statuses[mt_rand(0, 1)];

                DB::table('results')->insert([
                    'quizzes_subject_id' => $quizzesSubjectId,
                    'student_id' => $studentId,
                    'degree' => $degree,
                    'status' => $status,
                ]);
            }
        }
    }


}
