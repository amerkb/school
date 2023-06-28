<?php

namespace Database\Seeders;

use App\Models\Type_User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Type_UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type__users')->delete();
        $specializations = [
            'Oriented',
            'ًWorker',
            'Accountant',
            'Others', 
        ];
        foreach ($specializations as $S) {
            Type_User::create(['type' => $S]);
        }
    }
}
