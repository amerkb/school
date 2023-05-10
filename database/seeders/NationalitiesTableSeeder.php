<?php

namespace Database\Seeders;

use App\Models\Nationalitie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NationalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nationalities')->delete();

        $nationals = ['Afghan', 'Albanian', 'Aland Islander', 'Aland Islander',
        'Algerian','Andorran', 'Armenian', 'Argentinian', 'Australian',
        'Belgian','Bahraini','Bangladeshi','Belarusian','Brazilian',
        'Syrian','Egyptian', 'Colombian', 'Lebanese',
    ];

    foreach($nationals as $N) {
        Nationalitie::create(['Name' => $N]);
    }


    }
}
