<?php

namespace App\Observers;

use App\Models\Conversation;
use App\Models\Member;
use App\Models\Student;
use Carbon\Carbon;

class ChatStudentObserver
{
    /**
     * Handle the Student "created" event.
     */
    public function created(Student $student): void
    {
        //join to group class
        $class=$student->Classroom_id;
        $Conversation=Conversation::where([
            ["BelongTo_type","App\Models\Classroom"],
            ["BelongTo_id",$class]
        ])->select("id")->get();
        $member= new Member();
        $member->user_type="App\Models\Student";
        $member->user_id=$student->id;
        $member->conversation_id=$Conversation[0]["id"];
        $member->joined_at=Carbon::now();
        $member->save();
        //join to group section
        $section=$student->section_id;
        $Conversation=Conversation::where([
            ["BelongTo_type","App\Models\Section"],
            ["BelongTo_id",$section]
        ])->select("id")->get();
        $member= new Member();
        $member->user_type="App\Models\Student";
        $member->user_id=$student->id;
        $member->conversation_id=$Conversation[0]["id"];
        $member->joined_at=Carbon::now();
        $member->save();
    }

    /**
     * Handle the Student "updated" event.
     */
    public function updated(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "deleted" event.
     */
    public function deleted(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "restored" event.
     */
    public function restored(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "force deleted" event.
     */
    public function forceDeleted(Student $student): void
    {
        //
    }
}
