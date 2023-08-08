<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class ResultTransformer extends TransformerAbstract
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
    public function transform($result)
    {
        return [
            "result_id"=>$result->id,
            "result_degree"=>$result->degree,
            "result_status"=>$result->status,
            "subject_name"=>$result->se->subject->name,
            "subject_date"=>$result->se->date,
            "subject_time"=>$result->se->timeslot->full,

        ];
    }
}
