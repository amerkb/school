<?php

namespace App\Observers;

use App\Models\Classroom;
use App\Models\Conversation;

class ChatClassObserver
{
    /**
     * Handle the Classroom "created" event.
     */
    public function created(Classroom $classroom): void
    {
        $convresation= new Conversation();
        $convresation->BelongTo_type="App\Models\Classroom";
        $convresation->BelongTo_id=$classroom->id;
        $convresation->label=$classroom->Name_Class;
        $convresation->type="group";
        $convresation->save();

    }

    /**
     * Handle the Classroom "updated" event.
     */
    public function updated(Classroom $classroom): void
    {
        $convresation=Conversation::where([
            ["BelongTo_type","App\Models\Classroom"],
            ["BelongTo_id",$classroom->id]
        ])->update([
            "label"=>$classroom->Name_Class,
        ]);
    }

    /**
     * Handle the Classroom "deleted" event.
     */
    public function deleted(Classroom $classroom): void
    {
        $convresation=Conversation::where([
            ["BelongTo_type","App\Models\Classroom"],
            ["BelongTo_id",$classroom->id]
        ])->delete();

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
