<?php

namespace App\Transformers;

use App\Models\Gender;
use App\Models\Specialization;
use League\Fractal\TransformerAbstract;

class LectureTransformer extends TransformerAbstract
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
            "lecture_Timeslot"=>$l->timeslot->full,
            "lecture_Day"=>$l->day->name,
            "lecture_Teacher"=>$l->teacher->Name,
            "lecture_Subject"=>$l->subject->name,
        ];
    }
}
