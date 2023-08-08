<?php

namespace Database\Seeders;

use App\Models\MyParent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     MyParent::factory()->count(15)->create();   //
    }
}
