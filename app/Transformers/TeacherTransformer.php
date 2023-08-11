<?php

namespace App\Transformers;

use App\Models\Gender;
use App\Models\Specialization;
use League\Fractal\TransformerAbstract;

class TeacherTransformer extends TransformerAbstract
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
    public function transform($teacher)
    {
        $Specialization=Specialization::select("Name")->find($teacher->Specialization_id);
        $gender=  Gender::select("Name")->find($teacher->Gender_id);
        return [
            "teacher_Id"=>$teacher->id,
            "teacher_Name"=>$teacher->Name,
            "teacher_Specialization"=>$Specialization->Name,
            "teacher_Gender"=>$gender->Name,
            "teacher_Address"=>$teacher->Address,
            "teacher_Joining_Date"=>$teacher->Joining_Date,
            "teacher_phone"=>$teacher->phone


        ];
    }
}
