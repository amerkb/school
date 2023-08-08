<?php

namespace App\Transformers;

use App\Models\Gender;
use App\Models\Specialization;
use League\Fractal\TransformerAbstract;

class QuestionLibraryTransformer extends TransformerAbstract
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
            "Question_Id"=>$Curriculum->id,
            "Question_Name"=>$Curriculum->title,
            "Question_Grade"=>$Curriculum->grade->Name,
            "Question_Classroom"=>$Curriculum->classroom->Name_Class,
            "Question_Quizze"=>$Curriculum->quizze->name,
            "Question_Subject"=>$Curriculum->se->subject->name,
            "Question_Year"=>$Curriculum->quizze->year,
            "Question_path"=>'attachments/question/'.$Curriculum->file_name,


        ];
    }
}
