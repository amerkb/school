<?php

namespace App\Transformers;

use App\Models\Gender;
use App\Models\Specialization;
use League\Fractal\TransformerAbstract;

class TimeTableTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($ttr)
    {
        $lectures=[];
        foreach ($ttr->lecture as $index=> $tr){
            $lectures[$index] = fractal($tr, new LectureTransformer())->toArray();
            $lectures[$index]= $lectures[$index]["data"];
        }

        return [
            "timetable_Id"=>$ttr->id,
            "timetable_Name"=>$ttr->name,
            "timetable_Grade"=>$ttr->grades->Name,
            "timetable_Classroom"=>$ttr->classrooms->Name_Class,
            "timetable_Section"=>$ttr->sections->Name_Section,
            "timetable_Semester"=>$ttr->semester,
            "timetable_Year"=>$ttr->year,
            "timetable_Count_Lecture"=>$ttr->lecture->count(),
            "timetable_Lecture"=>$lectures,
        ];
    }
}
