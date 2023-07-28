<?php

namespace App\Transformers;

use App\Models\Gender;
use App\Models\Specialization;
use League\Fractal\TransformerAbstract;

class LessonTransformer extends TransformerAbstract
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
    public function transform($lesson)
    {
        $questions=[];
        foreach ($lesson->question as $index=> $question){
            $questions[$index] = fractal($question, new QuestionTransformer())->toArray();
            $questions[$index]= $questions[$index]["data"];
        }

        return [
            "Lesson_Id"=>$lesson->id,
            "Lesson_Title"=>$lesson->title,
            "Lesson_Description"=>$lesson->description,
            "Lesson_file"=>$lesson->filename,
            "Lesson_Year"=>$lesson->year,
            "Lesson_Count_Question"=>$lesson->question->count(),
            "Lesson_Question"=>$questions,


        ];
    }
}
