<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genders')->delete();

        $gender = ['Male', 'female'];

        foreach($gender as $G) {
            Gender::create([
                'Name' => $G
            ]);
        }
    }
}
