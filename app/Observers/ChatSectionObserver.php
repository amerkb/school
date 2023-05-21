<?php

namespace App\Observers;

use App\Models\Conversation;
use App\Models\Section;

class ChatSectionObserver
{
    /**
     * Handle the Section "created" event.
     */
    public function created(Section $section): void
    {
        $convresation= new Conversation();
        $convresation->BelongTo_type="App\Models\Section";
        $convresation->BelongTo_id=$section->id;
        $convresation->label=$section->Name_Section;
        $convresation->type="group";
        $convresation->save();
    }

    /**
     * Handle the Section "updated" event.
     */
    public function updated(Section $section): void
    {
        $convresation=Conversation::where([
            ["BelongTo_type","App\Models\Section"],
            ["BelongTo_id",$section->id]
        ])->update([
            "label"=>$section->Name_Section,
        ]);
    }

    /**
     * Handle the Section "deleted" event.
     */
    public function deleted(Section $section): void
    {
        $convresation=Conversation::where([
            ["BelongTo_type","App\Models\Section"],
            ["BelongTo_id",$section->id]
        ])->delete();
    }

    /**
     * Handle the Section "restored" event.
     */
    public function restored(Section $section): void
    {
        //
    }

    /**
     * Handle the Section "force deleted" event.
     */
    public function forceDeleted(Section $section): void
    {
        //
    }
}
