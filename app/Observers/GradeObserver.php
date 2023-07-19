<?php

namespace App\Observers;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;

class GradeObserver
{
    /**
     * Handle the Grade "created" event.
     */
    public function created(Grade $grade): void
    {
        //
    }

    /**
     * Handle the Grade "updated" event.
     */
    public function updated(Grade $grade): void
    {
       $classes= Classroom::where("Grade_id",$grade->id)->get();
       foreach ($classes as $class){
           $class->update(["Status"=>$grade->Status]);

       }
        $sections= Section::where("Grade_id",$grade->id)->get();
        foreach ($sections as $section){
            $section->update(["Status"=>$grade->Status]);
        }

    }

    /**
     * Handle the Grade "deleted" event.
     */
    public function deleted(Grade $grade): void
    {
        //
    }

    /**
     * Handle the Grade "restored" event.
     */
    public function restored(Grade $grade): void
    {
        //
    }

    /**
     * Handle the Grade "force deleted" event.
     */
    public function forceDeleted(Grade $grade): void
    {
        //
    }
}
