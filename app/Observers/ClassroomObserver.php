<?php

namespace App\Observers;

use App\Models\Classroom;
use App\Models\Section;

class ClassroomObserver
{
    /**
     * Handle the Classroom "created" event.
     */
    public function created(Classroom $classroom): void
    {
        //
    }

    /**
     * Handle the Classroom "updated" event.
     */
    public function updated(Classroom $classroom): void
    {
        $sections= Section::where("Class_id",$classroom->id)->get();
        foreach ($sections as $section){
            $section->update(["Status"=>$classroom->Status]);
        }
    }

    /**
     * Handle the Classroom "deleted" event.
     */
    public function deleted(Classroom $classroom): void
    {
        //
    }

    /**
     * Handle the Classroom "restored" event.
     */
    public function restored(Classroom $classroom): void
    {
        //
    }

    /**
     * Handle the Classroom "force deleted" event.
     */
    public function forceDeleted(Classroom $classroom): void
    {
        //
    }
}
