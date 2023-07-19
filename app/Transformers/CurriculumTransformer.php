<?php

namespace App\Transformers;

use App\Models\Gender;
use App\Models\Specialization;
use League\Fractal\TransformerAbstract;

class CurriculumTransformer extends TransformerAbstract
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
    public function transform($Curriculum)
    {


        return [
            "Curriculum_Id"=>$Curriculum->id,
            "Curriculum_Name"=>$Curriculum->title,
            "Curriculum_Grade"=>$Curriculum->grade->Name,
            "Curriculum_Classroom"=>$Curriculum->classroom->Name_Class,
            "Curriculum_Subject"=>$Curriculum->subject->name,
            "Curriculum_Year"=>$Curriculum->year,
            "Curriculum_path"=>'attachments/library/'.$Curriculum->file_name,


        ];
    }
}
