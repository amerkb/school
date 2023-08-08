<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class AttendanceTransformer extends TransformerAbstract
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
    public function transform($Attendance)
    {
        return [
            "attendance_id"=>$Attendance->id,
            "attendence_date"=>$Attendance->attendence_date,
            "attendence_status"=>$Attendance->attendence_status,

        ];
    }
}
