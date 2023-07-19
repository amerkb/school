<?php

namespace Database\Seeders;

use App\Models\Type_Exam;
use App\Models\Type_User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Type_examrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specializations = [
            ' test',
            ' quizze',
            ' exam',
        ];
        foreach ($specializations as $S) {
            Type_Exam::create(['name' => $S]);
        }
    }
}
