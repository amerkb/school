<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeTableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $year = '2023-2024';


            DB::table('time_table_records')->insert([
                "name"=>"name_time",
                'semester' => 1,
                'grade_id' => 1,
                'classroom_id' => 1,
                'section_id' => 1,
                'year' => $year,
            ]);
        DB::table('lectures')->insert([
           [ 'ts_id' => 1,
            'teacher_id' => 13,
            'subject_id' => 1,
            'day_id' => 1,
            'ttr_id' => 1,],
            [
                'ts_id' => 3,
                'teacher_id' => 12,
                'subject_id' => 5,
                'day_id' => 4,
                'ttr_id' => 1,
            ],
            [
                'ts_id' => 2,
                'teacher_id' => 4,
                'subject_id' => 1,
                'day_id' => 5,
                'ttr_id' => 1,
            ],[
                'ts_id' => 4,
                'teacher_id' => 4,
                'subject_id' => 1,
                'day_id' => 2,
                'ttr_id' => 1,
            ],[
                'ts_id' => 3,
                'teacher_id' => 3,
                'subject_id' => 3,
                'day_id' => 3,
                'ttr_id' => 1,
            ],


        ]);
        }

}
