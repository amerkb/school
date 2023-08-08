<?php

namespace App\Transformers;

use App\Models\Gender;
use App\Models\Specialization;
use League\Fractal\TransformerAbstract;

class StudentTransformer extends TransformerAbstract
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
    public function transform($student)
    {


        return [
            "Student_Id"=>$student->id,
            "Student_Name"=>$student->name,
            "Student_Gender"=>$student->gender->Name,
            "Student_Nationality"=>$student->Nationality->Name,
            "Student_Classroom"=>$student->classroom->Name_Class,
            "Student_Section"=>$student->section->Name_Section,
            "Student_Date_Birth"=>$student->Date_Birth,


        ];
    }
}
