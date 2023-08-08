<?php

namespace App\Transformers;

use App\Models\Gender;
use App\Models\Specialization;
use League\Fractal\TransformerAbstract;

class ScheduleTransformer extends TransformerAbstract
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
    public function transform($l)
    {


        return [
            "lecture_Id"=>$l->id,
            "lecture_Day"=>$l->day->name,
            "lecture_Timeslot"=>$l->timeslot->full,
            "lecture_Subject"=>$l->subject->name,
            "lecture_Classroom"=>$l->ttr->classrooms->Name_Class,
            "lecture_Section"=>$l->ttr->sections->Name_Section,


        ];
    }
}
