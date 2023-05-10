<?php

namespace Database\Seeders;
use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class religionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('religions')->delete();
        $religions = ['Muslim', 'Muslim', 'Other'];

        foreach($religions as $R) {
            Religion::create(['Name' => $R]);
        }
    }
}
