<?php

namespace App\Observers;

use App\Models\MyParent;

class ChatParentObserver
{
    /**
     * Handle the MyParent "created" event.
     */
    public function created(MyParent $myParent): void
    {
        //
    }

    /**
     * Handle the MyParent "updated" event.
     */
    public function updated(MyParent $myParent): void
    {
        //
    }

    /**
     * Handle the MyParent "deleted" event.
     */
    public function deleted(MyParent $myParent): void
    {
        //
    }

    /**
     * Handle the MyParent "restored" event.
     */
    public function restored(MyParent $myParent): void
    {
        //
    }

    /**
     * Handle the MyParent "force deleted" event.
     */
    public function forceDeleted(MyParent $myParent): void
    {
        //
    }
}
