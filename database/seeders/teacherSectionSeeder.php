<?php

namespace Database\Seeders;

use App\Models\Type_User;
use App\Models\User;
use Carbon\Carbon;
use Flasher\Prime\Template\Engine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class teacherSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 15; $i++) {
            for ($j = 1; $j <= 8; $j++) {
                DB::table('teacher_section')->insert([
                    'teacher_id' => $i,
                    'section_id' => $j,
                ]);
            }
        }
        for ($i = 1; $i <= 15; $i++) {
            for ($j = 1; $j <= 4; $j++) {
                for ($k = 1; $k <= 2; $k++) {
                    DB::table('subjects')->insert([
                        'name' => "arabic",
                        'teacher_id' => $i,
                        'classroom_id' => $j,
                        'grade_id' => 1,
                    ]);
                }
            }
        }
        for ($i = 1; $i <= 15; $i++) {
            for ($j = 1; $j <= 4; $j++) {
                for ($k = 1; $k <= 2; $k++) {
                    for ($l = 1; $l <= 8; $l++) {
                        $date = Carbon::today()->subDays(rand(0, 30))->format("Y-m-d");
                        $status = rand(0, 1);
                        DB::table('attendances')->insert([
                            'student_id' => $i,
                            'classroom_id' => $j,
                            'grade_id' => $k,
                            'section_id' => $l,
                            'attendence_date' => $date,
                            'attendence_status' => $status,
                        ]);
                    }
                }
            }
        }
    }
}
