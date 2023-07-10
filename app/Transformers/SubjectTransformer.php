<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class SubjectTransformer extends TransformerAbstract
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
    public function transform($subject)
    {
        return [
            "subject_id"=>$subject->id,
            "subject_name"=>$subject->name,
            "subject_category"=>$subject->category->name,

        ];
    }
}
