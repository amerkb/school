<?php

namespace App\Transformers;

use App\Models\Gender;
use App\Models\Specialization;
use League\Fractal\TransformerAbstract;

class QuestionTransformer extends TransformerAbstract
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
    public function transform($question)
    {

        $parts = explode("-", $question->answers);

        return [
            "Question_Id"=>$question->id,
            "Question_Title"=>$question->title,
            "Question_First_Answer"=>$parts[0],
            "Question_Second_Answer"=>$parts[1],
            "Question_Third_Answer"=>$parts[2],
            "Question_right_Answer"=>$question->right_answer,
            "Question_photo"=>$question->photo,


        ];
    }
}
