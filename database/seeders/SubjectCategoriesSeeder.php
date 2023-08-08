<?php

namespace Database\Seeders;

use App\Models\SubjectCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Categories = [
            'Courses',
            'Scientific',
            'Languages',
            'Art',
            'Math',
            'Literature'
        ];

        foreach ($Categories as $Category) {
            DB::table('subjects_categories')->insert(["name"=>$Category]);
        }
    }
}

