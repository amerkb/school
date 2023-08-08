<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class QuizzeTransformer extends TransformerAbstract
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
    public function transform($quizze)
    {
        return [
            "quizze_id"=>$quizze->id,
            "quizze_name"=>$quizze->name,
            "quizze_type"=>$quizze->Type->name,
            "quizze_semester"=>$quizze->semester,
            "quizze_year"=>$quizze->year,

        ];
    }
}
