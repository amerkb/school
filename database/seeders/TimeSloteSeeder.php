<?php

namespace Database\Seeders;

use App\Models\Day;
use App\Models\TimeSlote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeSloteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hour_from = [8, 9, 10, 11, 12];
        $min_from=["00", "00", "00", "00", "00"];
        $meridian_from=["AM", "AM", "AM", "AM", "AM"];
        $hour_to=[ 9, 10, 11, 12,1];
        $min_to=["00", "00", "00", "00", "00"];
        $meridian_to=["AM", "AM", "AM", "AM", "PM"];
        foreach($hour_from as $index=>$T) {
            $time_from="$hour_from[$index]:$min_from[$index] $meridian_from[$index]";
            $time_to="$hour_to[$index]:$min_to[$index] $meridian_to[$index]";
            $full="$time_from _ $time_to";
            TimeSlote::create([
                'hour_from' => $hour_from[$index],
                "min_from"=>$min_from[$index],
                "meridian_from"=>$meridian_from[$index],
                "hour_to"=>$hour_to[$index],
                "min_to"=>$min_to[$index],
                "meridian_to"=>$meridian_to[$index],
                "time_from"=>$time_from,
                "time_to"=>$time_to,
                "full"=>$full,


            ]);
    }
}}
