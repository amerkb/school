<?php

namespace App\Transformers;

use App\Models\Gender;
use App\Models\Specialization;
use League\Fractal\TransformerAbstract;

class OnlineTransformer extends TransformerAbstract
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
    public function transform($ttr)
    {


        return [
            "LessonOnline_Id"=>$ttr->id,
            "LessonOnline_Topic"=>$ttr->topic,
            "LessonOnline_Link"=>$ttr->join_url,
            "LessonOnline_Duration"=>$ttr->duration,
            "LessonOnline_start_at"=>$ttr->start_at,
            "LessonOnline_Password"=>$ttr->password,

        ];
    }
}
